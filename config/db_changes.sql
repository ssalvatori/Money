

/* 10:24:49 AM localhost */ ALTER TABLE `finanzas_accounts` ADD `accounttype_id` TINYINT(1)  NULL  DEFAULT NULL  AFTER `user_id`;
/* 10:32:16 AM localhost */ ALTER TABLE `finanzas_accounts` ADD `creditcard_amount` DOUBLE  NULL  DEFAULT NULL  AFTER `accounttype_id`;
/* 10:42:18 AM localhost */ ALTER TABLE `finanzas_transactions` CHANGE `monto` `amount` DOUBLE  NULL  DEFAULT NULL;