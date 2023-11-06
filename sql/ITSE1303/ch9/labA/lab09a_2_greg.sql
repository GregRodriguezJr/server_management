SELECT start_date,
	DATE_FORMAT(start_date, '%b/%d/%y') AS first_format,
    DATE_FORMAT(start_date, '%c/%e/%y') AS second_format,
    DATE_FORMAT(start_date, '%l:%i %p') AS third_format
FROM date_sample;