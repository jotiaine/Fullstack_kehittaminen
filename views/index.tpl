Hello

<br />

{* 
{php}
echo sha1('hello');
{/php} *}

{* {$date | date_format:} *}

{$name}

<table>
{foreach from = $people key = k item = p}
<tr style="background: {cycle values = 'silver, gray'}">
  <td>{$k}</td>
  <td>{$p}</td>
</tr>
{/foreach}
</table>