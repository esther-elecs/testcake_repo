<?php
is_null(env('CAKE_ENV')) ? config('Core/development') : config('Core/' . env('CAKE_ENV'));
