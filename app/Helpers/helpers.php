<?php
if (!function_exists('oldSelect')) {
    /**
     * Return the selected attribute if the given condition is true.
     *
     * @param mixed $value The current value of the select option
     * @param mixed $old The old value or the current value from the model
     * @return string
     */
    function oldSelect($value, $old)
    {
        return $value == $old ? 'selected' : '';
    }
}
