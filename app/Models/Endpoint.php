<?php namespace App\Models;

class Endpoint extends BaseModel {
    public function buildUrl() {
        return config('app.url') . '/' . $this->route;
    }

    protected function buildCurlCommand() {
        $lines = [];
        $lines[] = "curl -H 'Accept: application/vnd.erjensennet.v1+json'";
        $lines[] = "-X {$this->method} '{$this->buildUrl()}'";

        return join(" \\\n", $lines);
    }

    public function displayRequest() {
        if ($this->isStatic || true) { // TO DO: Finish nonstatic version. More than likely a small vue instance.
            return '<pre><code>'. $this->buildCurlCommand() .'</code></pre>';
        }
    }

    /**
     * For these two display methods, why should the store/delete methods be static?
     * @store: I can return a model without storing it.
     * @update: Same as above.
     * @delete: I can send the 204 if the model exists or 422 if it doesn't.
     *
     * Furthermore, I could actually require some ClientID of some sort to make those requests and create
     *      a special testing clientID that the front end would use. This means there's no static content.
     *      A little more work, but much more consistent. I like it.
     *
     * Next tough part will be to get a good responsive dynamic testing box for the endpoints. Eww.
     */

    public function displayResponse() {
        if ($this->isStatic || true) { // TO DO: Finish nonstatic version. More than likely a small vue instance.
            return '<pre><code></code></pre>';
        }


    }

    public function slugify() {
        return str_replace(strtolower($this->action), ' ', '-');
    }

    public function reference() {
        return $this->belongsTo(Reference::class);
    }
}
