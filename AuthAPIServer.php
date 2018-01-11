<?php

////////////////////////////////////////////////////////////////////////////////
//
// Copyright (c) 2009 wilson.souza
//
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:
//
// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// THE SOFTWARE.
//
////////////////////////////////////////////////////////////////////////////////
namespace testapiserver;

interface AuthAPIServer 
{
	/**
	 * Indicates whether the client is authorized to access the resource.
	 *
	 * @param string $path     The requested path.
	 * @param object $class_obj An instance of the controller for the path.
	 *
	 * @return bool True if authorized, false if not.
	 */
	public function is_authorized($class_obj);

	/**
	 * Handles the case where the client is not authorized.
	 * This method must either return data or throw a RestException.
	 *
	 * @param string $path The requested path.
	 *
	 * @return mixed The response to send to the client
	 *
	 * @throws RestException
	 */
	public function unauthorized($class_obj);
}
