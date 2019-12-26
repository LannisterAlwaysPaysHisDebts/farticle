---
title: PHP里的正则
date: 2019-12-26 15:25:00
tags: PHP
---
# 前言
正则表达式实在是日常开发中常用的、必备的工具之一。由于初学时的不认真，实践过少，导致每次业务开发遇到正则的问题都需要回顾文档以及各种谷歌。这里先将日常业务逻辑开发时遇到的一些有关正则的问题记录下来，以备不时之需。

> 正则表达式菜鸟教程： https://www.runoob.com/regexp/regexp-tutorial.html
> 正则表达式工具以及一些常用的表达式： https://c.runoob.com/front-end/854

# 一些常用的正则
1. 匹配所有: `([\s\S]*) `

2. 匹配以xx开头，而xx不在其中：`(?<=pattern)` 

3. 匹配以xx结尾，而xx不在其中：`(?=pattern)`

4. 匹配不以xx开头的：`(?<!pattern)`

5. 匹配不以xx结尾：`(?!pattern)`

6. 匹配数字，字母，汉字:  `[A-Za-z0-9\u4e00-\u9fa5]`

    ***ps:*** 在php里面的正则是: `[A-Za-z0-9\x{4e00}-\x{9fa5}]`特别注意，php里面匹配汉字需要在分隔符里面加u,如：匹配数字字母汉字1次以上:`#[A-Za-z0-9\x{4e00}-\x{9fa5}]{1,}#u`


# php里的正则表达式
1. matches左右用‘#’包含起来，比如: `preg_match('#(foo)(bar)(baz)#', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);`

2. unicode编码的数据，比如：`\u003d`，在php的pattern中需要改为：`\x{003d}`

3. 在php的pattern中‘\’是pattern这个字符串的转义字符，“\\”则是正则表达式的“\”，所以如果想匹配一个反斜杠“\”，就需要：`\\\\` 四个反斜杠

4. 使用`preg_replace` 替换: 
    ```
    preg_replace("#(?<=[a-zA-z])*(\d+)(?=[a-zA-Z])#", '<\1>', 'aaa55555bbb');
    ```
    其中, \1 代表被匹配的内容, 这里会将55555替换为: <55555>

