DROP TABLE IF EXISTS `#__dt_whatsapp_integration_phone_numbers`;
DROP TABLE IF EXISTS `#__dt_whatsapp_integration_blast_messages`;

DELETE FROM `#__content_types` WHERE (type_alias LIKE 'com_dt_whatsapp_integration.%');