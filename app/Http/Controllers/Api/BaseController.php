<?php namespace App\Http\Controllers\Api;

use App\Models\Api\BaseModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

abstract class BaseController extends Controller {
    use ValidatesRequests;

    protected $model;
    protected $maxLimit = 100;

    protected static $routePrefix = null;

    /**
     * Returns the string name of the called class.
     * This makes routing easier.
     *
     * @return string
     */
    public static function getClassName() {
        return substr(strrchr(get_called_class(), '\\'), 1);
    }

    /**
     * Returns the prefix that the controller's routes should exist on.
     *
     * @return string
     * @throws \Exception
     */
    public static function getRoutePrefix() {
        if (is_null(static::$routePrefix)) {
            throw new \Exception('Child classes must override static::$routePrefix to be properly used when routing.');
        }

        return static::$routePrefix;
    }

    /**
     * A helper method that wraps around a model's count method.
     *
     * @param string $columns
     * @return int
     */
    private function countHelper($columns = '*') {
        return call_user_func($this->model . '::count', ['columns' => $columns]);
    }

    /**
     * A helper method that wraps around a model's getPluralName method.
     *
     * @return string
     */
    private function getPluralNameHelper() {
        return call_user_func($this->model . '::getPluralName');
    }

    /**
     * A helper method that wraps around a model's get method with a limit and offset applied.
     *
     * @param $limit
     * @param $offset
     * @return \Illuminate\Support\Collection
     */
    private function getHelper($limit, $offset) {
        return call_user_func($this->model . '::skip', $offset)->take($limit)->get();
    }

    /**
     * A helper method that wraps around a model's create method.
     *
     * @param array $attributes
     * @return Collection|Model
     */
    private function createHelper(array $attributes = []) {
        return call_user_func($this->model . '::create', $attributes);
    }

    /**
     * A helper method that wraps around a model's findOrFail method.
     *
     * @param mixed $id
     * @param array $columns
     * @return Collection|Model
     */
    private function findOrFailHelper($id, $columns = ['*']) {
        return call_user_func($this->model . '::findOrFail', $id, $columns);
    }

    /**
     * A helper method that wraps around a model's destroy method.
     *
     * @param array|int $ids
     * @return int
     */
    private function destroyHelper($ids) {
        return call_user_func($this->model . '::destroy', ['ids' => $ids]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $limit
     * @param int $offset
     * @return \Illuminate\Http\Response
     */
    public function index($limit = 25, $offset = 0) {
        $count = $this->countHelper();

        if ($limit > $this->maxLimit) {
            throw new \InvalidArgumentException(
                "Invalid argument: The limit must be below {$this->maxLimit}. {$limit} was given."
            );
        }

        if ($offset >= $count) {
            throw new \InvalidArgumentException(
                "Invalid argument: The offset given ({$offset}) is greater than the total."
            );
        }

        return response()->json([
            '_total' => $count,
            $this->getPluralNameHelper() => $this->getHelper($limit, $offset),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * Returns the newly created model.
     *
     * @param \Illuminate\Http\Request   $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if ($request->attributes->get('isDemo')) {
            $model = new $this->model;
            $model->fill($request->all());
        } else {
            $model = $this->createHelper($request->all());
        }
        return $this->responsifyModel($model);
    }


    /**
     * Display the specified resource.
     *
     * Attempts to find a model with a matching ID. Fails otherwise.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $response = $this->findOrFailHelper($id);
        if ($response instanceof Collection) {
            $response = $response->get(0);
        }

        return $this->responsifyModel($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * Uses find or fail to find the matching model and then updates it.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $response = $this->findOrFailHelper($id);
        if ($response instanceof Collection) {
            $response = $response->get(0);
        }

        if ($request->attributes->get('isDemo')) {
            $response->fill($request->all());
        } else {
            $response->update($request->all());
        }

        return $this->responsifyModel($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * Returns HTTP 204 No Content on success.
     * Returns HTTP 422 Unprocessable Entity on fail.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        if ($request->attributes->get('isDemo')) {
            try {
                $destroyed = 1;
                $this->findOrFailHelper($id);
            } catch (ModelNotFoundException $e) {
                $destroyed = 0;
            }
        } else {
            $destroyed = $this->destroyHelper($id);
        }

        if ($destroyed > 0) {
            return response()->make(null, 204);
        }

        return response()->make(null, 422);
    }


    /**
     * Accepts a model and converts it into a JsonResponse.
     *
     * This is something that laravel should do normally, but this is explicit.
     *
     * @param Model $model
     * @return \Illuminate\Http\Response
     */
    protected function responsifyModel(Model $model) {
        return response()->json(
            $model->toArray()
        );
    }
}
