<?php
/**
 * this class is node of trie data structure 
 * $isWord = bool
 * $child = []
 */
class TrieNode {
    public $isWord=false;
    public $child=array();
}
 
/**
 * this class contains the parent of trie tree
 * $root : Object
 * functions add($str), search($str)
 */
class Trie
{
	private $root=null;
	function __construct()
	{
		$this->root=new TrieNode;
	}
	/**
	 *
	 *@param $str : String
	 *@return true if added else false
	 */
	function add($str)
	{

		$str=strtolower($str);//avoid case sensitivity
		
		$str_len=strlen($str);
		if($this->root!=null)
		{
			$temp=&$this->root;
			for($i=0;$i<$str_len;$i++) 
			{
				if (array_key_exists($str[$i],$temp->child)) 
				{
					$temp=&$temp->child[$str[$i]];	
				}
				else 
				{
					$temp->child[$str[$i]]=new TrieNode;
					$temp=&$temp->child[$str[$i]];
				}
			}
			$temp->isWord=true;

			/* $str add status */
    		return true;
		} 
		else
		{
			/* $str add status */
			return false;
		}
	}

	/**
	 *
	 *@param $str : String
	 *@return array([0]=>matched char. length [1]=>true if found else false)
	 */
	function search($str)
	{
		$status=array(0,false);
		$flag=false;
		$str=trim($str);
		$str_len=strlen($str);
		$count=0;
		$temp=&$this->root;
		for($i=0;$i<$str_len;$i++) 
		{
			if (array_key_exists($str[$i],$temp->child)) 
			{
				$temp=&$temp->child[$str[$i]];	
				++$count;
			}
			else
				break;
		}
		if ($i==$str_len&&$temp->isWord==true) 
		{
			$status[0]=$count;
			$status[1]=true;
			return $status;
		} 
		else 
		{
			$status[0]=$count;
			return $status;
		}
	}
}

$ob=new Trie;
$ob->add('indian institute of management, ahmedabad');
$ob->add('iima');
$ob->add('faculty of management studies, university of delhi, delhi');
$ob->add('faculty of management studies');
$status=$ob->search('faculty of management studies');

?>
