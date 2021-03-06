<?php exit?><!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta name="keywords" content="<!--{$category.keywords|escape:html}-->" />
<meta name="description" content="<!--{$category.description|escape:html}-->" />
<meta name="copyright" content="Powered by YCKIT" />
<title><!--{$category.name|escape:html}--> - <!--{$config.title|escape:html}--></title>
<!--{include file="static.php"}-->
<script>
$(function(){
	$("#menu-{$category.menu_id}").addClass("current");
	<?php $this->hook('onload');?>
});
</script>
</head>
<body>
<div id="page">
	<!--{$header}-->
	<div id="content">
		<!--{foreach from=$article item=article}-->
			<div class="post">
				<div class="post-header">
					<h1 class="post-title">
						<a href="<!--{$article.uri}-->" rel="bookmark" title="<!--{$article.title|escape:html}-->" {if $article.is_nofollow==1}rel="nofollow"{/if}><!--{$article.title}--></a>
					</h1>
					<div class="post-meta">
						<!--{if $article.author}-->Post by <!--{$article.author}--><!--{else}-->Post by {$config.author}<!--{/if}-->
						 · <!--{$article.time|timestamp:"Y.m.d"}-->
						 · <a href="<!--{$article.category_path}-->"><!--{$article.category_name}--></a>
						 · <a href="<!--{$article.uri}-->#comment" rel="bookmark" title="<!--{$article.title|escape:html}-->" <!--{if $article.is_nofollow eq 1}-->rel="nofollow"<!--{/if}-->><!--{$article.comment_count}--> replies</a>
						 · <!--{$article.click_count}--> views
					</div>
				</div>
				<div class="post-content"><!--{$article.content}--></div>
			</div>
		<!--{/foreach}--> 
	    
		<!--{if $pager.page_count>1}-->
			<div class="pager">
			<ul>
			<!--{if $pager.begin}-->
				<li><a href="{if $config.content_mode==1}list<!--{$pager.begin}-->.html{elseif $config.content_mode==2}{$path}category/{$category.id}/page/<!--{$pager.begin}-->/{else}{$path}content.php?cid={$category.id}&page=<!--{$pager.begin}-->{/if}">&laquo;</a></li>
			<!--{else}-->
				<li class="disabled"><a>&laquo;</a></li>
			<!--{/if}-->

			<!--{foreach from=$pager.no key=key item=href}-->
			<!--{if $pager.current==$key}-->
				<li class="active"><a><!--{$key}--></a></li>
			<!--{else}-->
				<li><a href="{if $config.content_mode==1}list<!--{$href}-->.html{elseif $config.content_mode==2}{$path}category/{$category.id}/page/<!--{$key}-->/{else}{$path}content.php?cid={$category.id}&page=<!--{$key}-->{/if}"><!--{$key}--></a></li>
			<!--{/if}-->
			<!--{/foreach}-->

			<!--{if $pager.end}-->
				<li><a href="{if $config.content_mode==1}list<!--{$pager.end}-->.html{elseif $config.content_mode==2}{$path}category/{$category.id}/page/<!--{$pager.end}-->/{else}{$path}content.php?cid={$category.id}&page=<!--{$pager.end}-->{/if}">&raquo;</a></li>
			<!--{else}-->
				<li class="disabled"><a>&raquo;</a></li>
			<!--{/if}-->
			</ul>
			</div>
		<!--{/if}-->
	</div>
	<!--{include file="side.php"}-->
	<div class="clear"></div>
	<!--{$footer}-->
</div>
</body>
</html>