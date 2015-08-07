<?php
class ENCschema{
	const URL = 'http://schema.org/';
	const itemScope = 'itemscope';
	const itemType = 'itemtype';
	
	/*ITEM TYPES & ITEM PROPS*/
	const personAuthor = '{"itemprop":"author", "itemtype":"Person"}';
	const videoVideoObject = '{"itemprop":"video", "itemtype":"VideoObject"}';
	
	/*Item Types*/
	const blog = '{"itemtype":"Blog"}';
	const blogPosting = '{"itemtype":"BlogPosting"}';
	const imageObject = '{"itemtype":"ImageObject"}';
	const person = '{"itemtype":"Person"}';
	const videoObject = '{"itemtype":"VideoObject"}';
	
	/*Item Props*/
	const contentUrl = '{"itemprop":"contentUrl"}';
	const datePublished = '{"itemprop":"datePublished"}';
	const headline = '{"itemprop":"headline"}';
	const author = '{"itemprop":"author"}';
	const url = '{"itemprop":"url"}';
	const name = '{"itemprop":"name"}';
	const articleBody = '{"itemprop":"articleBody"}';
	const description = '{"itemprop":"description"}';
	const video = '{"itemprop":"video"}';
}
?>