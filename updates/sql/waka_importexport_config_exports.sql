INSERT INTO `waka_importexport_config_exports` (`id`, `name`, `model`, `type_id`, `column_list`, `use_batch`) VALUES (1, 'Export contact', 'Waka\\Crsm\\Models\\Contact', 2, 'base:\r\n    fields:\r\n        name: \r\n            column: prenom\r\n        surname:\r\n            column: nom_famille\r\n        client:\r\n            column: nom_client\r\n            relation: client\r\n            select: name\r\n        slug:\r\n            column: slug_client\r\n            relation: client\r\n            select: slug', 0);
INSERT INTO `waka_importexport_config_exports` (`id`, `name`, `model`, `type_id`, `column_list`, `use_batch`) VALUES (2, 'Export client', 'Waka\\Crsm\\Models\\Client', 2, 'base:\r\n    fields:\r\n        name:\r\n            column: name\r\n        slug:\r\n            column: slug\r\n        adresse:\r\n            column: adresse\r\n        city:\r\n            column: ville\r\n        cp:\r\n            column: cp\r\n        sector_id:\r\n            column: sector\r\n            relation: sector\r\n            select: slug', 0);