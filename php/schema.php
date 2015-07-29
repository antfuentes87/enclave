<?php
class schema{
	public $schemaURL = 'http://schema.org/';
	public $ImageObject = '{"itemtype":"ImageObject"}';
	public $contentUrl = '{"itemprop":"contentUrl"}';
	public $author = '{"itemprop":"author"}';
	public $Person = '{"itemtype":"Person"}';
	public $authorPerson = '{"itemprop":"author", "itemtype":"Person"}';
	public $personAuthor = '{"itemtype":"Person", "itemprop":"author"}';
	public $url = '{"itemprop":"url"}';
}
?>