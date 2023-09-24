SELECT 
    v.vendor_name,
    v.default_account_number,
    GLA.account_description
FROM
    vendors AS v
        LEFT JOIN
    General_Ledger_Accounts AS GLA ON v.default_account_number = GLA.account_number
ORDER BY GLA.account_description ASC , v.vendor_name ASC;