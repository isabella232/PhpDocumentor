{capture name="mlink"}{if $constructor}Constructor {else}Method {/if}{$intricatefunctioncall.name}{/capture}
{capture name="mindex"}{if $constructor}constructor {/if}{$class}::{$intricatefunctioncall.name}()|||{$sdesc}{/capture}
<pdffunction:addDestination arg="{$dest}" arg="FitH" arg=$this->y />
<text size="10" justification="left">{if $constructor}Constructor {else}{/if}<i>{$return}</i> function {$class}::{$intricatefunctioncall.name}({section name=params loop=$intricatefunctioncall.params}{if $smarty.section.params.index > 0}, {/if}{if $intricatefunctioncall.params[params].default != ''}[{/if}{$intricatefunctioncall.params[params].name}{if $intricatefunctioncall.params[params].default != ''} = {$intricatefunctioncall.params[params].default}]{/if}{/section}) <i>[line {if $slink}{$slink}{else}{$linenumber}{/if}]</i><C:rf:3{$smarty.capture.mlink|rawurlencode}><C:index:{$smarty.capture.mindex|rawurlencode}></text>
