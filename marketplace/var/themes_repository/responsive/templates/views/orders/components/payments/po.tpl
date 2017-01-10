<div class="ty-control-group">
    <label for="elm_po_number" class="cm-required">{__("po_number")}:</label>
    <input id="elm_po_number" size="35" type="text" name="payment_info[po_number]" value="{$cart.payment_info.po_number}" class="ty-input-text cm-focus">
</div>

<div class="ty-control-group">
    <label for="elm_company_name" class="cm-required">{__("company_name")}:</label>
    <input id="elm_company_name" size="35" type="text" name="payment_info[company_name]" value="{$cart.payment_info.company_name}" class="ty-input-text">
</div>

<div class="ty-control-group">
    <label for="elm_buyer_name" class="cm-required">{__("buyer_name")}:</label>
    <input id="elm_buyer_name" size="35" type="text" name="payment_info[buyer_name]" value="{$cart.payment_info.buyer_name}" class="ty-input-text">
</div>

<div class="ty-control-group">
    <label for="elm_position" class="cm-required">{__("position")}:</label>
    <input id="elm_position" size="35" type="text" name="payment_info[position]" value="{$cart.payment_info.position}" class="ty-input-text-short">
</div>