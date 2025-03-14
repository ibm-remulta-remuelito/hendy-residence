<?php


function field_required($for_input = FALSE) 
{
    return '<span '.(($for_input)? 'data-for="'.$for_input.'"' : '').' class="required">*</span>';
}

