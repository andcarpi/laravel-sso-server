<?php

namespace andcarpi\LaravelSSOServer\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $fields = [];
        foreach (config('laravel-sso-server.userFields') as $key => $value) {
            $fields[$key] = $this->{$value};
        }

        return $fields;
    }
}
