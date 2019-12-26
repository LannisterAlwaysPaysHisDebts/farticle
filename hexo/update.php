<?php

$sourcePath = './public/';
if (!is_dir($sourcePath)) {
    exit("Public文件不存在" . PHP_EOL);
}

$copyPath = realpath('../');

$fileList = getList($sourcePath);
if (empty($fileList)) {
    exit("Public文件夹为空" . PHP_EOL);
}

foreach ($fileList as $item) {
    $fileName = str_replace("./public/", "", $item);
    $dest = "{$copyPath}/{$fileName}";
    
    $dirName = dirname($dest);
    if (!is_dir($dirName)) {
        createDir($dirName);
    }

    $res = copy($item, $dest);
    if ($res === false) {
        echo "拷贝失败： {$item}" . PHP_EOL;
    }
}

exit("copy完毕， 一共复制了" . count($fileList) . "个文件" . PHP_EOL);

function getList($path, $list = [])
{
    $dirHandle = opendir($path);
    while (($fileName = readdir($dirHandle)) !== false) {
        if (!in_array($fileName, ['.', '..'])) {
            $realPath = $path . $fileName;
            if (is_dir($realPath)) {
                $mergeList = getList($realPath . '/', $list);
                $list = array_merge($list, $mergeList);
            } else {
                $list[] = $realPath;
            }
        }
    }
    return $list;
}

function createDir($path)
{
    $parentDir = dirname($path);
    if (!is_dir($parentDir)) {
        createDir($parentDir);
    }        
    mkdir($path);
    return true;
}