@extends('layouts.sidebarred')

@section('sidebar')
    @include('endpoints.sidebar')
@endsection

@section('content')
    @foreach ($endpoints as $endpoint)
        @include('endpoints.single')
    @endforeach
        <h1 id="channel-feed" class="reference-title">Channel Feed</h1>

        <table class="endpoint">
            <thead>
                <tr>
                    <th>Endpoint</th>
                    <th style="text-align: left">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="#get-multiple-feed-posts">Get Multiple Feed Posts</a></td>
                    <td style="text-align: left">Gets posts from a specified channel feed.</td>
                </tr>
                <tr>
                    <td><a href="#get-feed-post">Get Feed Post</a></td>
                    <td style="text-align: left">Gets a specified post from a specified channel feed.</td>
                </tr>
                <tr>
                    <td><a href="#create-feed-post">Create Feed Post</a></td>
                    <td style="text-align: left">Creates a post in a specified channel feed. The content of the post is specified in the request body, with a <em>required</em> <code class="highlighter-rouge">content</code> parameter.</td>
                </tr>
                <tr>
                    <td><a href="#delete-feed-post">Delete Feed Post</a></td>
                    <td style="text-align: left">Deletes a specified post in a specified channel feed.</td>
                </tr>
                <tr>
                    <td><a href="#create-reaction-to-a-feed-post">Create Reaction to a Feed Post</a></td>
                    <td style="text-align: left">Creates a reaction to a specified post in a specified channel feed. The reaction is specified by an emote value, which is either an ID (for example, “25” is Kappa) or the string “endorse” (which corresponds to a default face emote).</td>
                </tr>
                <tr>
                    <td><a href="#delete-reaction-to-a-feed-post">Delete Reaction to a Feed Post</a></td>
                    <td style="text-align: left">Deletes a specified reaction to a specified post in a specified channel feed. The reaction is specified by an emote ID (for example, “25” is Kappa) or the string “endorse” (which corresponds to a default face emote).</td>
                </tr>
                <tr>
                    <td><a href="#get-feed-comments">Get Feed Comments</a></td>
                    <td style="text-align: left">Gets all comments on a specified post in a specified channel feed.</td>
                </tr>
                <tr>
                    <td><a href="#create-feed-comment">Create Feed Comment</a></td>
                    <td style="text-align: left">Creates a comment to a specified post in a specified channel feed. The comment content can be specified either as a query-string parameter or in the request body (in x-www-form-urlencoded format).</td>
                </tr>
                <tr>
                    <td><a href="#delete-feed-comment">Delete Feed Comment</a></td>
                    <td style="text-align: left">Deletes a specified comment on a specified post in a specified channel feed.</td>
                </tr>
                <tr>
                    <td><a href="#create-reaction-to-a-feed-comment">Create Reaction to a Feed Comment</a></td>
                    <td style="text-align: left">Creates a reaction to a specified comment on a specified post in a specified channel feed. The reaction is specified by an emote value, which is either an ID (for example, “25” is Kappa) or the string “endorse” (which corresponds to a default face emote).</td>
                </tr>
                <tr>
                    <td><a href="#delete-reaction-to-a-feed-comment">Delete Reaction to a Feed Comment</a></td>
                    <td style="text-align: left">Deletes a reaction to a specified comment on a specified post in a specified channel feed. The reaction is specified by an emote value, which is either an ID (for example, “25” is Kappa) or the string “endorse” (which corresponds to a default face emote).</td>
                </tr>
            </tbody>
        </table>

        <h2 class="endpoint" id="get-multiple-feed-posts">Get Multiple Feed Posts</h2>

        <p>Gets posts from a specified channel feed.</p>

        <h3 id="authentication">Authentication</h3>

        <p>Optional scope: any scope</p>

        <p>If authentication is provided, the <code class="highlighter-rouge">user_ids</code> array in the response body contains the requesting user’s ID, if they have reacted to a post.</p>

        <h3 id="url">URL</h3>

        <p><code class="highlighter-rouge">GET https://api.twitch.tv/kraken/feed/&lt;channel ID&gt;/posts</code></p>

        <h3 id="optional-query-string-parameters">Optional Query String Parameters</h3>

        <table class="endpoint">
            <thead>
                <tr>
                    <th style="text-align: left">Name</th>
                    <th style="text-align: left">Type</th>
                    <th style="text-align: left">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: left"><code class="highlighter-rouge">limit</code></td>
                    <td style="text-align: left">long</td>
                    <td style="text-align: left">Maximum number of most-recent objects to return. Default: 10. Maximum: 100.</td>
                </tr>
                <tr>
                    <td style="text-align: left"><code class="highlighter-rouge">cursor</code></td>
                    <td style="text-align: left">string</td>
                    <td style="text-align: left">Tells the server where to start fetching the next set of results in a multi-page response.</td>
                </tr>
                <tr>
                    <td style="text-align: left"><code class="highlighter-rouge">comments</code></td>
                    <td style="text-align: left">long</td>
                    <td style="text-align: left">Specifies the number of most-recent comments on posts that are included in the response. Default: 5. Maximum: 5.</td>
                </tr>
            </tbody>
        </table>

        <h3 id="example-request">Example Request</h3>

        <p>This gets the most recent post from channel feed 44322889.</p>

        <div class="language-bash highlighter-rouge"><div class="highlight"><table style="border-spacing: 0"><tbody><tr><td class="gutter gl" style="text-align: right"><pre class="lineno">1
2
3
4</pre></td><td class="code"><pre>curl -H <span class="s1">'Accept: application/vnd.twitchtv.v5+json'</span> <span class="se">\</span>
-H <span class="s1">'Client-ID: uo6dggojyb8d6soh92zknwmi5ej1q2'</span> <span class="se">\</span>
-H <span class="s1">'Authorization: OAuth cfabdegwdoklmawdzdo98xt2fo512y'</span> <span class="se">\</span>
-X GET <span class="s1">'https://api.twitch.tv/kraken/feed/44322889/posts?limit=1'</span>
</pre></td></tr></tbody></table>
            </div>
        </div>

        <h3 id="example-response">Example Response</h3>

        <div class="language-json highlighter-rouge"><div class="highlight"><table style="border-spacing: 0"><tbody><tr><td class="gutter gl" style="text-align: right"><pre class="lineno">1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76</pre></td><td class="code"><pre><span class="p">{</span><span class="w">
   </span><span class="nt">"_cursor"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1479487861147094000"</span><span class="p">,</span><span class="w">
   </span><span class="nt">"_topic"</span><span class="p">:</span><span class="w"> </span><span class="s2">"feeds.channel.44322889"</span><span class="p">,</span><span class="w">
   </span><span class="nt">"_disabled"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
   </span><span class="nt">"posts"</span><span class="p">:</span><span class="w"> </span><span class="p">[{</span><span class="w">
      </span><span class="nt">"body"</span><span class="p">:</span><span class="w"> </span><span class="s2">"News feed post!"</span><span class="p">,</span><span class="w">
      </span><span class="nt">"comments"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
         </span><span class="nt">"_cursor"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1480434747093939000"</span><span class="p">,</span><span class="w">
         </span><span class="nt">"_total"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
         </span><span class="nt">"comments"</span><span class="p">:</span><span class="w"> </span><span class="p">[{</span><span class="w">
               </span><span class="nt">"body"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hey there! KappaHD"</span><span class="p">,</span><span class="w">
               </span><span class="nt">"created_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-11-29T15:52:27Z"</span><span class="p">,</span><span class="w">
               </span><span class="nt">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
               </span><span class="nt">"emotes"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                  </span><span class="p">{</span><span class="w">
                     </span><span class="nt">"end"</span><span class="p">:</span><span class="w"> </span><span class="mi">17</span><span class="p">,</span><span class="w">
                     </span><span class="nt">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">115847</span><span class="p">,</span><span class="w">
                     </span><span class="nt">"set"</span><span class="p">:</span><span class="w"> </span><span class="mi">19194</span><span class="p">,</span><span class="w">
                     </span><span class="nt">"start"</span><span class="p">:</span><span class="w"> </span><span class="mi">11</span><span class="w">
                  </span><span class="p">}</span><span class="w">
               </span><span class="p">],</span><span class="w">
               </span><span class="nt">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"132629"</span><span class="p">,</span><span class="w">
               </span><span class="nt">"permissions"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                  </span><span class="nt">"can_delete"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
               </span><span class="p">},</span><span class="w">
               </span><span class="nt">"reactions"</span><span class="p">:</span><span class="w"> </span><span class="p">{},</span><span class="w">
               </span><span class="nt">"user"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                  </span><span class="nt">"_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">44322889</span><span class="p">,</span><span class="w">
                  </span><span class="nt">"bio"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Just a gamer playing games and chatting. :)"</span><span class="p">,</span><span class="w">
                  </span><span class="nt">"created_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2013-06-03T19:12:02Z"</span><span class="p">,</span><span class="w">
                  </span><span class="nt">"display_name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"dallas"</span><span class="p">,</span><span class="w">
                  </span><span class="nt">"logo"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://static-cdn.jtvnw.net/jtv_user_pictures/dallas-profile_image-1a2c906ee2c35f12-300x300.png"</span><span class="p">,</span><span class="w">
                  </span><span class="nt">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"dallas"</span><span class="p">,</span><span class="w">
                  </span><span class="nt">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"staff"</span><span class="p">,</span><span class="w">
                  </span><span class="nt">"updated_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-11-29T15:31:48Z"</span><span class="w">
               </span><span class="p">}</span><span class="w">
         </span><span class="p">}]</span><span class="w">
      </span><span class="p">},</span><span class="w">
      </span><span class="nt">"created_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-11-18T16:51:01Z"</span><span class="p">,</span><span class="w">
      </span><span class="nt">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nt">"embeds"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nt">"emotes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nt">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"443228891479487861"</span><span class="p">,</span><span class="w">
      </span><span class="nt">"permissions"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
         </span><span class="nt">"can_delete"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
         </span><span class="nt">"can_moderate"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
         </span><span class="nt">"can_reply"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="w">
      </span><span class="p">},</span><span class="w">
      </span><span class="nt">"reactions"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
         </span><span class="nt">"25"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
               </span><span class="nt">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
               </span><span class="nt">"emote"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kappa"</span><span class="p">,</span><span class="w">
               </span><span class="nt">"user_ids"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                  </span><span class="mi">44322889</span><span class="w">
               </span><span class="p">]</span><span class="w">
         </span><span class="p">},</span><span class="w">
         </span><span class="nt">"endorse"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
               </span><span class="nt">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
               </span><span class="nt">"emote"</span><span class="p">:</span><span class="w"> </span><span class="s2">"endorse"</span><span class="p">,</span><span class="w">
               </span><span class="nt">"user_ids"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                  </span><span class="mi">44322889</span><span class="w">
               </span><span class="p">]</span><span class="w">
         </span><span class="p">}</span><span class="w">
      </span><span class="p">},</span><span class="w">
      </span><span class="nt">"user"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
         </span><span class="nt">"_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">44322889</span><span class="p">,</span><span class="w">
         </span><span class="nt">"bio"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Just a gamer playing games and chatting. :)"</span><span class="p">,</span><span class="w">
         </span><span class="nt">"created_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2013-06-03T19:12:02Z"</span><span class="p">,</span><span class="w">
         </span><span class="nt">"display_name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"dallas"</span><span class="p">,</span><span class="w">
         </span><span class="nt">"logo"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://static-cdn.jtvnw.net/jtv_user_pictures/dallas-profile_image-1a2c906ee2c35f12-300x300.png"</span><span class="p">,</span><span class="w">
         </span><span class="nt">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"dallas"</span><span class="p">,</span><span class="w">
         </span><span class="nt">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"staff"</span><span class="p">,</span><span class="w">
         </span><span class="nt">"updated_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-11-29T15:31:48Z"</span><span class="w">
      </span><span class="p">}</span><span class="w">
   </span><span class="p">}]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></pre></td></tr></tbody></table>
            </div>
        </div>
@endsection
