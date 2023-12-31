<?php

namespace root\src\Views;

function getHeads($tabs) {
    $heads = [];

    foreach($tabs as $tab) {
        if(!$tab['parent_id']) array_push($heads, $tab);
    }

    return $heads;
}

function getChildren($node, $tabs) {
    $children = [];

    foreach($tabs as $tab) {
        if($tab['parent_id'] === $node['id']) array_push($children, $tab);
    }

    return $children;
}

function renderNode($node, $tabs) {
    $children = getChildren($node, $tabs);

    echo "
    <ul>
       </br>
       <input type='text' name='header_".$node['id']."'>
            ".$node['header']."
       </input>
       </br>
       <input type='text' name='content_".$node['id']."' />
            ".$node['content']."
       </input>
       </br>
       <button name='add_".$node['id']."' >Add</button>
       <button name='refresh_".$node['id']."' > Refresh </button>
       <button name='delete_".$node['id']."' > Delete </button>
    ";

    foreach($children as $child) echo "<li>".renderNode($child, $tabs)."</li>";

    echo "</ul>";
    
}