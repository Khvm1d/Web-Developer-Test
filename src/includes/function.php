<?php
function db_connect($host, $user, $password, $db_name)
{
    $link = mysqli_connect($host, $user, $password, $db_name);

    if(!$link)
    {
        die ('Ошибка подключения('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    return $link;
}

function getCategories($link)
{
    if ($result = mysqli_query($link, "SELECT * FROM categories"))
    {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

function createTree($arr)
{
    $parents_arr = array();
    foreach($arr as $key=>$item)
    {
        $parents_arr[$item['parent_id']][$item['id']]=$item;
    }

    $treeElem = $parents_arr[0];
    generateElemTree($treeElem,$parents_arr);

    return $treeElem    ;
}

function generateElemTree(&$treeElem,$parent_arr)
{
    foreach ($treeElem as $key=>$item)
    {
        if (!isset($item['children']))
        {
            $treeElem[$key]['children'] = array();
        }
        if(array_key_exists($key,$parent_arr))
        {
            $treeElem[$key]['children'] = $parent_arr[$key];
            generateElemTree($treeElem[$key]['children'],$parent_arr);

        }
    }
}

function renderTemplate($path,$arr)
{
    $output = '';

    if(file_exists($path))
    {
        extract($arr);

        ob_start();
        include $path;
        $output = ob_get_clean();

    }
    return $output;
}

?>

