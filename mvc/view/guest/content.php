<?php
    
switch($viewDescriptor->getSubPage()) 
{
    case 'shoe_details':
        include 'subpages/shoe_details.php';

        break;
    
    case 'prova':
        include 'subpages/prova.php';

        break;
    
    default:
        include 'subpages/home.php';
        break; 
}
?>


