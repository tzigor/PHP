<?php

set_exception_handler(function (Throwable $exception) {
    die('Service temporarily unavailable. Sorry for inconvenience.');
});
