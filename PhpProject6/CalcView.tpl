{extends file="main.tpl"}

{block name=content}
<section>
    <h2>Kalkulator Kredytowy</h2>
    <form action="{$conf->action_root}calcCompute" method="post" class="alt">
        <div class="row gtr-uniform">
            <div class="col-12">
                <label for="amount">Kwota kredytu (PLN)</label>
                <input type="text" name="amount" id="amount" value="{$form->amount}" placeholder="np. 100000" />
            </div>
            <div class="col-12">
                <label for="rate">Oprocentowanie roczne (%)</label>
                <input type="text" name="rate" id="rate" value="{$form->rate}" placeholder="np. 5" />
            </div>
            <div class="col-12">
                <label for="years">Okres spłaty</label>
                <select name="years" id="years">
                    <option value="" {if !isset($form->years)}selected{/if} disabled>Wybierz okres</option>
                    <option value="1" {if $form->years == 1}selected{/if}>1 rok</option>
                    <option value="2" {if $form->years == 2}selected{/if}>2 lata</option>
                    <option value="3" {if $form->years == 3}selected{/if}>3 lata</option>
                    <option value="5" {if $form->years == 5}selected{/if}>5 lat</option>
                    <option value="10" {if $form->years == 10}selected{/if}>10 lat</option>
                </select>
            </div>
            <div class="col-12">
                <ul class="actions">
                    <li><input type="submit" value="Oblicz ratę" class="primary" /></li>
                </ul>
            </div>
        </div>
    </form>

    <div class="messages">
        {if $msgs->isError()}
            <h4>Wystąpiły błędy:</h4>
            <ul class="errors">
                {foreach $msgs->getErrors() as $err}
                    <li>{$err}</li>
                {/foreach}
            </ul>
        {/if}

        {if $msgs->isInfo()}
            <h4>Informacje:</h4>
            <ul class="infos">
                {foreach $msgs->getInfos() as $inf}
                    <li>{$inf}</li>
                {/foreach}
            </ul>
        {/if}

        {if isset($res->monthly_payment)}
            <h4>Miesięczna rata</h4>
            <p class="result">{$res->monthly_payment} PLN</p>
        {/if}
    </div>
</section>
{/block}