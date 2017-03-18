<?php

use Tymon\JWTAuth\Facades\JWTAuth;

function getAuthenticatedUser()
{
    try {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['User not found'], 404);
        }

    } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

        return response()->json(['Token expired'], $e->getStatusCode());

    } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

        return response()->json(['Token invalid'], $e->getStatusCode());

    } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

        return response()->json(['Token absent'], $e->getStatusCode());

    }

    // the token is valid and we have found the user via the sub claim
    return $user;
}