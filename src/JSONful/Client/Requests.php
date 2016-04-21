<?php
/*
 * Copyright (c) 2016 JSONful
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
namespace JSONful\Client;

class Requests
{
    protected $requests = array();
    protected $globals = array();

    public function add($name, $args = [])
    {
        $request = new Request($name, $args);
        $this->requests[] = $request;
        return $request;
    }

    public function setSession($session)
    {
        $this->globals['session'] = (string)$session;
        return $this;
    }

    public function toArray()
    {
        $reqs = array();
        foreach ($this->requests as $req) {
            $reqs[] = [$req->getName(), $req->getArguments()];
        }

        return array_merge($this->globals, [
            'requests' => $reqs,
        ]);
    }
}
