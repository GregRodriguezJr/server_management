SELECT 
    V.vendor_name,
    I.invoice_date,
    I.invoice_number,
    ILI.invoice_sequence,
    ILI.line_item_amount
FROM
    Vendors AS V
        INNER JOIN
    Invoices AS I ON V.vendor_id = I.vendor_id
        INNER JOIN
    Invoice_Line_Items AS ILI ON I.invoice_id = ILI.invoice_id
ORDER BY V.vendor_name , I.invoice_date , I.invoice_number , ILI.invoice_sequence;