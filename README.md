# Trie-php-implementation

How to use trie.php
-------------------------
$ob=new Trie;

//add($str) return true or false

$ob->add('indian institute of management, ahmedabad');

$ob->add('iima');

$ob->add('faculty of management studies, university of delhi, delhi');

$ob->add('faculty of management studies');


//search($str) will return array([0]=>matched char. length, [1]=>true or false)

$status=$ob->search('faculty of management studies');
