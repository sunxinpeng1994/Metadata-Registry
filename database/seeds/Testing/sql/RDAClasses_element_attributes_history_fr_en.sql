# select reg_schema_property_element_history.* from reg_schema_property_element_history, reg_schema_property_element, reg_schema_property
# where reg_schema_property.schema_id=83
# and reg_schema_property.id = reg_schema_property_element.schema_property_id
# and reg_schema_property_element.id=reg_schema_property_element_history.schema_property_element_id
# and (reg_schema_property_element_history.language in ("fr","en") or reg_schema_property_element_history.language is null)

INSERT INTO `reg_schema_property_element_history` (`id`, `created_at`, `updated_at`, `created_user_id`, `action`, `schema_property_element_id`, `schema_property_id`, `schema_id`, `profile_property_id`, `object`, `related_schema_property_id`, `language`, `status_id`, `change_note`, `import_id`, `created_by`) VALUES
	(120869,'2014-01-18 22:43:38',NULL,422,'added',107697,14328,83,1,'Work',NULL,'en',1,NULL,NULL,NULL),
	(258584,'2016-12-16 11:12:17',NULL,422,'deleted',107697,14328,83,1,'Work',NULL,'en',1,NULL,NULL,NULL),
	(120870,'2014-01-18 22:43:38',NULL,422,'added',107698,14328,83,2,'Work',NULL,'en',1,NULL,NULL,NULL),
	(223712,'2016-08-29 08:59:09',NULL,422,'updated',107698,14328,83,2,'work',NULL,'en',1,NULL,570,NULL),
	(120871,'2014-01-18 22:43:38',NULL,422,'added',107699,14328,83,3,'A distinct intellectual or artistic creation (i.e., the intellectual or artistic content).',NULL,'en',1,NULL,NULL,NULL),
	(218721,'2016-07-11 21:38:17',NULL,422,'updated',107699,14328,83,3,'A distinct intellectual or artistic creation, that is, the intellectual or artistic content.',NULL,'en',1,NULL,379,NULL),
	(120872,'2014-01-18 22:43:38',NULL,422,'added',107700,14328,83,4,'class',NULL,'en',1,NULL,NULL,NULL),
	(120873,'2014-01-18 22:43:38',NULL,422,'added',107701,14328,83,13,'http://rdaregistry.info/Elements/c/C10001',NULL,'en',1,NULL,NULL,NULL),
	(120874,'2014-01-18 22:43:38',NULL,422,'added',107702,14328,83,14,'1',NULL,'en',1,NULL,NULL,NULL),
	(120875,'2014-01-18 22:43:38',NULL,422,'added',107703,14328,83,16,'http://rdaregistry.info/Elements/c/Work',NULL,'en',1,NULL,NULL,NULL),
	(134652,'2014-01-18 22:51:02',NULL,422,'updated',107703,14328,83,16,'http://rdaregistry.info/Elements/c/Work',14328,'en',1,NULL,NULL,NULL),
	(148567,'2015-06-20 19:37:45',NULL,422,'added',128168,14328,83,27,'http://rdaregistry.info/Elements/c/Work.en',NULL,'en',1,NULL,2,NULL),
	(164635,'2015-12-06 17:35:20',NULL,422,'added',139429,14328,83,32,'Work',NULL,'en',1,NULL,72,NULL),
	(218722,'2016-07-11 21:38:17',NULL,422,'updated',139429,14328,83,32,'work',NULL,'en',1,NULL,379,NULL),
	(164636,'2015-12-06 17:35:20',NULL,422,'added',139430,14328,83,33,'A distinct intellectual or artistic creation (i.e., the intellectual or artistic content).',NULL,'en',1,NULL,72,NULL),
	(218723,'2016-07-11 21:38:17',NULL,422,'updated',139430,14328,83,33,'A distinct intellectual or artistic creation, that is, the intellectual or artistic content.',NULL,'en',1,NULL,379,NULL),
	(210206,'2016-02-17 10:14:07',NULL,422,'added',180568,14328,83,2,'Œuvre',NULL,'fr',1,NULL,271,NULL),
	(210207,'2016-02-17 10:14:07',NULL,422,'added',180569,14328,83,3,'Création intellectuelle ou artistique déterminée (c’est-à-dire le contenu intellectuel ou artistique).',NULL,'fr',1,NULL,271,NULL),
	(223632,'2016-07-28 09:56:35',NULL,422,'updated',180569,14328,83,3,'Création intellectuelle ou artistique déterminée, c’est-à-dire le contenu intellectuel ou artistique.',NULL,'fr',1,NULL,449,NULL),
	(210208,'2016-02-17 10:14:07',NULL,422,'added',180570,14328,83,32,'Œuvre',NULL,'fr',1,NULL,271,NULL),
	(210209,'2016-02-17 10:14:07',NULL,422,'added',180571,14328,83,33,'Création intellectuelle ou artistique déterminée (c’est-à-dire le contenu intellectuel ou artistique).',NULL,'fr',1,NULL,271,NULL),
	(223633,'2016-07-28 09:56:35',NULL,422,'updated',180571,14328,83,33,'Création intellectuelle ou artistique déterminée, c’est-à-dire le contenu intellectuel ou artistique.',NULL,'fr',1,NULL,449,NULL),
	(258756,'2016-12-16 13:55:20',NULL,422,'added',213450,14328,83,1,'Work',NULL,'en',1,NULL,729,NULL),
	(120876,'2014-01-18 22:43:38',NULL,422,'added',107704,14329,83,1,'Agent',NULL,'en',1,NULL,NULL,NULL),
	(120877,'2014-01-18 22:43:38',NULL,422,'added',107705,14329,83,2,'Agent',NULL,'en',1,NULL,NULL,NULL),
	(223717,'2016-08-29 08:59:09',NULL,422,'updated',107705,14329,83,2,'agent',NULL,'en',1,NULL,570,NULL),
	(120878,'2014-01-18 22:43:38',NULL,422,'added',107706,14329,83,3,'A person, family, or corporate body.',NULL,'en',1,NULL,NULL,NULL),
	(120879,'2014-01-18 22:43:38',NULL,422,'added',107707,14329,83,4,'class',NULL,'en',1,NULL,NULL,NULL),
	(120880,'2014-01-18 22:43:38',NULL,422,'added',107708,14329,83,13,'http://rdaregistry.info/Elements/c/C10002',NULL,'en',1,NULL,NULL,NULL),
	(120881,'2014-01-18 22:43:38',NULL,422,'added',107709,14329,83,14,'1',NULL,'en',1,NULL,NULL,NULL),
	(120882,'2014-01-18 22:43:38',NULL,422,'added',107710,14329,83,16,'http://rdaregistry.info/Elements/c/Agent',NULL,'en',1,NULL,NULL,NULL),
	(134653,'2014-01-18 22:51:02',NULL,422,'updated',107710,14329,83,16,'http://rdaregistry.info/Elements/c/Agent',14329,'en',1,NULL,NULL,NULL),
	(134656,'2014-01-18 22:51:02',NULL,422,'added',119923,14329,83,10,'',14331,'en',1,NULL,NULL,NULL),
	(134659,'2014-01-18 22:51:02',NULL,422,'added',119924,14329,83,10,'',14332,'en',1,NULL,NULL,NULL),
	(134664,'2014-01-18 22:51:02',NULL,422,'added',119925,14329,83,10,'',14335,'en',1,NULL,NULL,NULL),
	(148569,'2015-06-20 19:37:45',NULL,422,'added',128169,14329,83,27,'http://rdaregistry.info/Elements/c/Agent.en',NULL,'en',1,NULL,2,NULL),
	(164637,'2015-12-06 17:35:20',NULL,422,'added',139431,14329,83,32,'Agent',NULL,'en',1,NULL,72,NULL),
	(218724,'2016-07-11 21:38:17',NULL,422,'updated',139431,14329,83,32,'agent',NULL,'en',1,NULL,379,NULL),
	(164638,'2015-12-06 17:35:20',NULL,422,'added',139432,14329,83,33,'A person, family, or corporate body.',NULL,'en',1,NULL,72,NULL),
	(210210,'2016-02-17 10:14:07',NULL,422,'added',180572,14329,83,2,'Agent',NULL,'fr',1,NULL,271,NULL),
	(210211,'2016-02-17 10:14:07',NULL,422,'added',180573,14329,83,3,'Personne, famille ou collectivité.',NULL,'fr',1,NULL,271,NULL),
	(210212,'2016-02-17 10:14:07',NULL,422,'added',180574,14329,83,32,'Agent',NULL,'fr',1,NULL,271,NULL),
	(210213,'2016-02-17 10:14:07',NULL,422,'added',180575,14329,83,33,'Personne, famille ou collectivité.',NULL,'fr',1,NULL,271,NULL),
	(120883,'2014-01-18 22:43:38',NULL,422,'added',107711,14330,83,1,'Item',NULL,'en',1,NULL,NULL,NULL),
	(258587,'2016-12-16 11:12:17',NULL,422,'deleted',107711,14330,83,1,'Item',NULL,'en',1,NULL,NULL,NULL),
	(120884,'2014-01-18 22:43:38',NULL,422,'added',107712,14330,83,2,'Item',NULL,'en',1,NULL,NULL,NULL),
	(223722,'2016-08-29 08:59:09',NULL,422,'updated',107712,14330,83,2,'item',NULL,'en',1,NULL,570,NULL),
	(120885,'2014-01-18 22:43:38',NULL,422,'added',107713,14330,83,3,'A single exemplar or instance of a manifestation.',NULL,'en',1,NULL,NULL,NULL),
	(120886,'2014-01-18 22:43:38',NULL,422,'added',107714,14330,83,4,'class',NULL,'en',1,NULL,NULL,NULL),
	(120887,'2014-01-18 22:43:38',NULL,422,'added',107715,14330,83,13,'http://rdaregistry.info/Elements/c/C10003',NULL,'en',1,NULL,NULL,NULL),
	(120888,'2014-01-18 22:43:38',NULL,422,'added',107716,14330,83,14,'1',NULL,'en',1,NULL,NULL,NULL),
	(120889,'2014-01-18 22:43:38',NULL,422,'added',107717,14330,83,16,'http://rdaregistry.info/Elements/c/Item',NULL,'en',1,NULL,NULL,NULL),
	(134654,'2014-01-18 22:51:02',NULL,422,'updated',107717,14330,83,16,'http://rdaregistry.info/Elements/c/Item',14330,'en',1,NULL,NULL,NULL),
	(148571,'2015-06-20 19:37:45',NULL,422,'added',128170,14330,83,27,'http://rdaregistry.info/Elements/c/Item.en',NULL,'en',1,NULL,2,NULL),
	(164639,'2015-12-06 17:35:20',NULL,422,'added',139433,14330,83,32,'Item',NULL,'en',1,NULL,72,NULL),
	(218725,'2016-07-11 21:38:17',NULL,422,'updated',139433,14330,83,32,'item',NULL,'en',1,NULL,379,NULL),
	(164640,'2015-12-06 17:35:20',NULL,422,'added',139434,14330,83,33,'A single exemplar or instance of a manifestation.',NULL,'en',1,NULL,72,NULL),
	(210214,'2016-02-17 10:14:07',NULL,422,'added',180576,14330,83,2,'Item',NULL,'fr',1,NULL,271,NULL),
	(210215,'2016-02-17 10:14:07',NULL,422,'added',180577,14330,83,3,'Exemplaire isolé ou occurrence d’une manifestation.',NULL,'fr',1,NULL,271,NULL),
	(210216,'2016-02-17 10:14:07',NULL,422,'added',180578,14330,83,32,'Item',NULL,'fr',1,NULL,271,NULL),
	(210217,'2016-02-17 10:14:07',NULL,422,'added',180579,14330,83,33,'Exemplaire isolé ou occurrence d’une manifestation.',NULL,'fr',1,NULL,271,NULL),
	(258758,'2016-12-16 13:55:20',NULL,422,'added',213452,14330,83,1,'Item',NULL,'en',1,NULL,729,NULL),
	(120890,'2014-01-18 22:43:38',NULL,422,'added',107718,14331,83,1,'Person',NULL,'en',1,NULL,NULL,NULL),
	(258590,'2016-12-16 11:12:17',NULL,422,'deleted',107718,14331,83,1,'Person',NULL,'en',1,NULL,NULL,NULL),
	(120891,'2014-01-18 22:43:38',NULL,422,'added',107719,14331,83,2,'Person',NULL,'en',1,NULL,NULL,NULL),
	(223727,'2016-08-29 08:59:09',NULL,422,'updated',107719,14331,83,2,'person',NULL,'en',1,NULL,570,NULL),
	(120892,'2014-01-18 22:43:38',NULL,422,'added',107720,14331,83,3,'An individual or an identity established by an individual (either alone or in collaboration with one or more other individuals).',NULL,'en',1,NULL,NULL,NULL),
	(218726,'2016-07-11 21:38:17',NULL,422,'updated',107720,14331,83,3,'An individual or an identity established by an individual, either alone or in collaboration with one or more other individuals.',NULL,'en',1,NULL,379,NULL),
	(120893,'2014-01-18 22:43:38',NULL,422,'added',107721,14331,83,4,'subclass',NULL,'en',1,NULL,NULL,NULL),
	(120894,'2014-01-18 22:43:38',NULL,422,'added',107722,14331,83,13,'http://rdaregistry.info/Elements/c/C10004',NULL,'en',1,NULL,NULL,NULL),
	(120895,'2014-01-18 22:43:38',NULL,422,'added',107723,14331,83,14,'1',NULL,'en',1,NULL,NULL,NULL),
	(120896,'2014-01-18 22:43:38',NULL,422,'added',107724,14331,83,9,'http://rdaregistry.info/Elements/c/C10002',NULL,'en',1,NULL,NULL,NULL),
	(134655,'2014-01-18 22:51:02',NULL,422,'updated',107724,14331,83,9,'http://rdaregistry.info/Elements/c/C10002',14329,'en',1,NULL,NULL,NULL),
	(120897,'2014-01-18 22:43:38',NULL,422,'added',107725,14331,83,16,'http://rdaregistry.info/Elements/c/Person',NULL,'en',1,NULL,NULL,NULL),
	(134657,'2014-01-18 22:51:02',NULL,422,'updated',107725,14331,83,16,'http://rdaregistry.info/Elements/c/Person',14331,'en',1,NULL,NULL,NULL),
	(148573,'2015-06-20 19:37:45',NULL,422,'added',128171,14331,83,27,'http://rdaregistry.info/Elements/c/Person.en',NULL,'en',1,NULL,2,NULL),
	(164641,'2015-12-06 17:35:20',NULL,422,'added',139435,14331,83,32,'Person',NULL,'en',1,NULL,72,NULL),
	(218727,'2016-07-11 21:38:17',NULL,422,'updated',139435,14331,83,32,'person',NULL,'en',1,NULL,379,NULL),
	(164642,'2015-12-06 17:35:20',NULL,422,'added',139436,14331,83,33,'An individual or an identity established by an individual (either alone or in collaboration with one or more other individuals).',NULL,'en',1,NULL,72,NULL),
	(218728,'2016-07-11 21:38:17',NULL,422,'updated',139436,14331,83,33,'An individual or an identity established by an individual, either alone or in collaboration with one or more other individuals..',NULL,'en',1,NULL,379,NULL),
	(223631,'2016-07-28 09:47:16',NULL,422,'updated',139436,14331,83,33,'An individual or an identity established by an individual, either alone or in collaboration with one or more other individuals.',NULL,'en',1,NULL,448,NULL),
	(210218,'2016-02-17 10:14:07',NULL,422,'added',180580,14331,83,2,'Personne',NULL,'fr',1,NULL,271,NULL),
	(210219,'2016-02-17 10:14:07',NULL,422,'added',180581,14331,83,3,'Individu ou identité établie par un individu (seul ou en collaboration avec un ou plusieurs autres individus).',NULL,'fr',1,NULL,271,NULL),
	(223634,'2016-07-28 09:56:35',NULL,422,'updated',180581,14331,83,3,'Individu ou identité établie par un individu, seul ou en collaboration avec un ou plusieurs autres individus.',NULL,'fr',1,NULL,449,NULL),
	(210220,'2016-02-17 10:14:07',NULL,422,'added',180582,14331,83,32,'Personne',NULL,'fr',1,NULL,271,NULL),
	(210221,'2016-02-17 10:14:07',NULL,422,'added',180583,14331,83,33,'Individu ou identité établie par un individu (seul ou en collaboration avec un ou plusieurs autres individus).',NULL,'fr',1,NULL,271,NULL),
	(223635,'2016-07-28 09:56:35',NULL,422,'updated',180583,14331,83,33,'Individu ou identité établie par un individu, seul ou en collaboration avec un ou plusieurs autres individus.',NULL,'fr',1,NULL,449,NULL),
	(258759,'2016-12-16 13:55:20',NULL,422,'added',213453,14331,83,1,'Person',NULL,'en',1,NULL,729,NULL),
	(120898,'2014-01-18 22:43:38',NULL,422,'added',107726,14332,83,1,'CorporateBody',NULL,'en',1,NULL,NULL,NULL),
	(258593,'2016-12-16 11:12:17',NULL,422,'deleted',107726,14332,83,1,'CorporateBody',NULL,'en',1,NULL,NULL,NULL),
	(120899,'2014-01-18 22:43:38',NULL,422,'added',107727,14332,83,2,'Corporate body',NULL,'en',1,NULL,NULL,NULL),
	(223732,'2016-08-29 08:59:09',NULL,422,'updated',107727,14332,83,2,'corporate body',NULL,'en',1,NULL,570,NULL),
	(120900,'2014-01-18 22:43:38',NULL,422,'added',107728,14332,83,3,'An organization or group of persons and/or organizations that is identified by a particular name and that acts, or may act, as a unit.',NULL,'en',1,NULL,NULL,NULL),
	(120901,'2014-01-18 22:43:38',NULL,422,'added',107729,14332,83,4,'subclass',NULL,'en',1,NULL,NULL,NULL),
	(120902,'2014-01-18 22:43:38',NULL,422,'added',107730,14332,83,13,'http://rdaregistry.info/Elements/c/C10005',NULL,'en',1,NULL,NULL,NULL),
	(120903,'2014-01-18 22:43:38',NULL,422,'added',107731,14332,83,14,'1',NULL,'en',1,NULL,NULL,NULL),
	(120904,'2014-01-18 22:43:38',NULL,422,'added',107732,14332,83,9,'http://rdaregistry.info/Elements/c/C10002',NULL,'en',1,NULL,NULL,NULL),
	(134658,'2014-01-18 22:51:02',NULL,422,'updated',107732,14332,83,9,'http://rdaregistry.info/Elements/c/C10002',14329,'en',1,NULL,NULL,NULL),
	(120905,'2014-01-18 22:43:38',NULL,422,'added',107733,14332,83,16,'http://rdaregistry.info/Elements/c/CorporateBody',NULL,'en',1,NULL,NULL,NULL),
	(134660,'2014-01-18 22:51:02',NULL,422,'updated',107733,14332,83,16,'http://rdaregistry.info/Elements/c/CorporateBody',14332,'en',1,NULL,NULL,NULL),
	(148575,'2015-06-20 19:37:46',NULL,422,'added',128172,14332,83,27,'http://rdaregistry.info/Elements/c/CorporateBody.en',NULL,'en',1,NULL,2,NULL),
	(164643,'2015-12-06 17:35:20',NULL,422,'added',139437,14332,83,32,'Corporate body',NULL,'en',1,NULL,72,NULL),
	(218729,'2016-07-11 21:38:17',NULL,422,'updated',139437,14332,83,32,'corporate body',NULL,'en',1,NULL,379,NULL),
	(164644,'2015-12-06 17:35:20',NULL,422,'added',139438,14332,83,33,'An organization or group of persons and/or organizations that is identified by a particular name and that acts, or may act, as a unit.',NULL,'en',1,NULL,72,NULL),
	(210222,'2016-02-17 10:14:07',NULL,422,'added',180584,14332,83,2,'Collectivité',NULL,'fr',1,NULL,271,NULL),
	(210223,'2016-02-17 10:14:07',NULL,422,'added',180585,14332,83,3,'Organisation, ou groupe de personnes et/ou d’organisations, qui est identifiée par un nom particulier et qui agit ou peut agir comme une unité.',NULL,'fr',1,NULL,271,NULL),
	(210224,'2016-02-17 10:14:07',NULL,422,'added',180586,14332,83,32,'Collectivité',NULL,'fr',1,NULL,271,NULL),
	(210225,'2016-02-17 10:14:07',NULL,422,'added',180587,14332,83,33,'Organisation, ou groupe de personnes et/ou d’organisations, qui est identifiée par un nom particulier et qui agit ou peut agir comme une unité.',NULL,'fr',1,NULL,271,NULL),
	(258761,'2016-12-16 13:55:21',NULL,422,'added',213454,14332,83,1,'CorporateBody',NULL,'en',1,NULL,729,NULL),
	(120906,'2014-01-18 22:43:38',NULL,422,'added',107734,14333,83,1,'Expression',NULL,'en',1,NULL,NULL,NULL),
	(258596,'2016-12-16 11:12:17',NULL,422,'deleted',107734,14333,83,1,'Expression',NULL,'en',1,NULL,NULL,NULL),
	(120907,'2014-01-18 22:43:38',NULL,422,'added',107735,14333,83,2,'Expression',NULL,'en',1,NULL,NULL,NULL),
	(223737,'2016-08-29 08:59:09',NULL,422,'updated',107735,14333,83,2,'expression',NULL,'en',1,NULL,570,NULL),
	(120908,'2014-01-18 22:43:38',NULL,422,'added',107736,14333,83,3,'The intellectual or artistic realization of a work in the form of alpha-numeric, musical or choreographic notation, sound, image, object, movement, etc., or any combination of such forms.',NULL,'en',1,NULL,NULL,NULL),
	(218730,'2016-07-11 21:38:17',NULL,422,'updated',107736,14333,83,3,'An intellectual or artistic realization of a work in the form of alpha-numeric, musical or choreographic notation, sound, image, object, movement, etc., or any combination of such forms.',NULL,'en',1,NULL,379,NULL),
	(120909,'2014-01-18 22:43:38',NULL,422,'added',107737,14333,83,4,'class',NULL,'en',1,NULL,NULL,NULL),
	(120910,'2014-01-18 22:43:38',NULL,422,'added',107738,14333,83,13,'http://rdaregistry.info/Elements/c/C10006',NULL,'en',1,NULL,NULL,NULL),
	(120911,'2014-01-18 22:43:38',NULL,422,'added',107739,14333,83,14,'1',NULL,'en',1,NULL,NULL,NULL),
	(120912,'2014-01-18 22:43:38',NULL,422,'added',107740,14333,83,16,'http://rdaregistry.info/Elements/c/Expression',NULL,'en',1,NULL,NULL,NULL),
	(134661,'2014-01-18 22:51:02',NULL,422,'updated',107740,14333,83,16,'http://rdaregistry.info/Elements/c/Expression',14333,'en',1,NULL,NULL,NULL),
	(148577,'2015-06-20 19:37:46',NULL,422,'added',128173,14333,83,27,'http://rdaregistry.info/Elements/c/Expression.en',NULL,'en',1,NULL,2,NULL),
	(164645,'2015-12-06 17:35:20',NULL,422,'added',139439,14333,83,32,'Expression',NULL,'en',1,NULL,72,NULL),
	(218731,'2016-07-11 21:38:17',NULL,422,'updated',139439,14333,83,32,'expression',NULL,'en',1,NULL,379,NULL),
	(164646,'2015-12-06 17:35:20',NULL,422,'added',139440,14333,83,33,'The intellectual or artistic realization of a work in the form of alpha-numeric, musical or choreographic notation, sound, image, object, movement, etc., or any combination of such forms.',NULL,'en',1,NULL,72,NULL),
	(218732,'2016-07-11 21:38:17',NULL,422,'updated',139440,14333,83,33,'An intellectual or artistic realization of a work in the form of alpha-numeric, musical or choreographic notation, sound, image, object, movement, etc., or any combination of such forms.',NULL,'en',1,NULL,379,NULL),
	(210226,'2016-02-17 10:14:07',NULL,422,'added',180588,14333,83,2,'Expression',NULL,'fr',1,NULL,271,NULL),
	(210227,'2016-02-17 10:14:07',NULL,422,'added',180589,14333,83,3,'La réalisation intellectuelle ou artistique d’une œuvre sous la forme d’une notation alphanumérique, musicale ou chorégraphique, de son, d’image, d’objet, de mouvement, etc. ou de toute combinaison de ces formes.',NULL,'fr',1,NULL,271,NULL),
	(210228,'2016-02-17 10:14:07',NULL,422,'added',180590,14333,83,32,'Expression',NULL,'fr',1,NULL,271,NULL),
	(210229,'2016-02-17 10:14:07',NULL,422,'added',180591,14333,83,33,'La réalisation intellectuelle ou artistique d’une œuvre sous la forme d’une notation alphanumérique, musicale ou chorégraphique, de son, d’image, d’objet, de mouvement, etc. ou de toute combinaison de ces formes.',NULL,'fr',1,NULL,271,NULL),
	(258763,'2016-12-16 13:55:21',NULL,422,'added',213456,14333,83,1,'Expression',NULL,'en',1,NULL,729,NULL),
	(120913,'2014-01-18 22:43:38',NULL,422,'added',107741,14334,83,1,'Manifestation',NULL,'en',1,NULL,NULL,NULL),
	(258599,'2016-12-16 11:12:17',NULL,422,'deleted',107741,14334,83,1,'Manifestation',NULL,'en',1,NULL,NULL,NULL),
	(120914,'2014-01-18 22:43:38',NULL,422,'added',107742,14334,83,2,'Manifestation',NULL,'en',1,NULL,NULL,NULL),
	(223742,'2016-08-29 08:59:10',NULL,422,'updated',107742,14334,83,2,'manifestation',NULL,'en',1,NULL,570,NULL),
	(120915,'2014-01-18 22:43:38',NULL,422,'added',107743,14334,83,3,'The physical embodiment of an expression of a work.',NULL,'en',1,NULL,NULL,NULL),
	(218733,'2016-07-11 21:38:17',NULL,422,'updated',107743,14334,83,3,'A physical embodiment of an expression of a work.',NULL,'en',1,NULL,379,NULL),
	(120916,'2014-01-18 22:43:38',NULL,422,'added',107744,14334,83,4,'class',NULL,'en',1,NULL,NULL,NULL),
	(120917,'2014-01-18 22:43:38',NULL,422,'added',107745,14334,83,13,'http://rdaregistry.info/Elements/c/C10007',NULL,'en',1,NULL,NULL,NULL),
	(120918,'2014-01-18 22:43:38',NULL,422,'added',107746,14334,83,14,'1',NULL,'en',1,NULL,NULL,NULL),
	(120919,'2014-01-18 22:43:38',NULL,422,'added',107747,14334,83,16,'http://rdaregistry.info/Elements/c/Manifestation',NULL,'en',1,NULL,NULL,NULL),
	(134662,'2014-01-18 22:51:02',NULL,422,'updated',107747,14334,83,16,'http://rdaregistry.info/Elements/c/Manifestation',14334,'en',1,NULL,NULL,NULL),
	(148579,'2015-06-20 19:37:46',NULL,422,'added',128174,14334,83,27,'http://rdaregistry.info/Elements/c/Manifestation.en',NULL,'en',1,NULL,2,NULL),
	(164647,'2015-12-06 17:35:20',NULL,422,'added',139441,14334,83,32,'Manifestation',NULL,'en',1,NULL,72,NULL),
	(218734,'2016-07-11 21:38:17',NULL,422,'updated',139441,14334,83,32,'manifestation',NULL,'en',1,NULL,379,NULL),
	(164648,'2015-12-06 17:35:20',NULL,422,'added',139442,14334,83,33,'The physical embodiment of an expression of a work.',NULL,'en',1,NULL,72,NULL),
	(218735,'2016-07-11 21:38:17',NULL,422,'updated',139442,14334,83,33,'A physical embodiment of an expression of a work.',NULL,'en',1,NULL,379,NULL),
	(210230,'2016-02-17 10:14:07',NULL,422,'added',180592,14334,83,2,'Manifestation',NULL,'fr',1,NULL,271,NULL),
	(210231,'2016-02-17 10:14:07',NULL,422,'added',180593,14334,83,3,'La matérialisation d’une expression d’une œuvre.',NULL,'fr',1,NULL,271,NULL),
	(210232,'2016-02-17 10:14:07',NULL,422,'added',180594,14334,83,32,'Manifestation',NULL,'fr',1,NULL,271,NULL),
	(210233,'2016-02-17 10:14:07',NULL,422,'added',180595,14334,83,33,'La matérialisation d’une expression d’une œuvre.',NULL,'fr',1,NULL,271,NULL),
	(258765,'2016-12-16 13:55:21',NULL,422,'added',213458,14334,83,1,'Manifestation',NULL,'en',1,NULL,729,NULL),
	(120920,'2014-01-18 22:43:38',NULL,422,'added',107748,14335,83,1,'Family',NULL,'en',1,NULL,NULL,NULL),
	(120921,'2014-01-18 22:43:38',NULL,422,'added',107749,14335,83,2,'Family',NULL,'en',1,NULL,NULL,NULL),
	(223747,'2016-08-29 08:59:10',NULL,422,'updated',107749,14335,83,2,'family',NULL,'en',1,NULL,570,NULL),
	(120922,'2014-01-18 22:43:38',NULL,422,'added',107750,14335,83,3,'Two or more persons related by birth, marriage, adoption, civil union, or similar legal status, or who otherwise present themselves as a family.',NULL,'en',1,NULL,NULL,NULL),
	(120923,'2014-01-18 22:43:38',NULL,422,'added',107751,14335,83,4,'subclass',NULL,'en',1,NULL,NULL,NULL),
	(120924,'2014-01-18 22:43:38',NULL,422,'added',107752,14335,83,13,'http://rdaregistry.info/Elements/c/C10008',NULL,'en',1,NULL,NULL,NULL),
	(120925,'2014-01-18 22:43:38',NULL,422,'added',107753,14335,83,14,'1',NULL,'en',1,NULL,NULL,NULL),
	(120926,'2014-01-18 22:43:38',NULL,422,'added',107754,14335,83,9,'http://rdaregistry.info/Elements/c/C10002',NULL,'en',1,NULL,NULL,NULL),
	(134663,'2014-01-18 22:51:02',NULL,422,'updated',107754,14335,83,9,'http://rdaregistry.info/Elements/c/C10002',14329,'en',1,NULL,NULL,NULL),
	(120927,'2014-01-18 22:43:38',NULL,422,'added',107755,14335,83,16,'http://rdaregistry.info/Elements/c/Family',NULL,'en',1,NULL,NULL,NULL),
	(134665,'2014-01-18 22:51:02',NULL,422,'updated',107755,14335,83,16,'http://rdaregistry.info/Elements/c/Family',14335,'en',1,NULL,NULL,NULL),
	(148581,'2015-06-20 19:37:46',NULL,422,'added',128175,14335,83,27,'http://rdaregistry.info/Elements/c/Family.en',NULL,'en',1,NULL,2,NULL),
	(164649,'2015-12-06 17:35:20',NULL,422,'added',139443,14335,83,32,'Family',NULL,'en',1,NULL,72,NULL),
	(218736,'2016-07-11 21:38:17',NULL,422,'updated',139443,14335,83,32,'family',NULL,'en',1,NULL,379,NULL),
	(164650,'2015-12-06 17:35:20',NULL,422,'added',139444,14335,83,33,'Two or more persons related by birth, marriage, adoption, civil union, or similar legal status, or who otherwise present themselves as a family.',NULL,'en',1,NULL,72,NULL),
	(210234,'2016-02-17 10:14:07',NULL,422,'added',180596,14335,83,2,'Famille',NULL,'fr',1,NULL,271,NULL),
	(210235,'2016-02-17 10:14:07',NULL,422,'added',180597,14335,83,3,'Deux ou plusieurs personnes liées par la naissance, le mariage, l’adoption, l’union civile ou tout autre statut légal de même ordre ou bien des personnes qui, pour toute autre raison, se présentent elles-mêmes comme une famille.',NULL,'fr',1,NULL,271,NULL),
	(210236,'2016-02-17 10:14:07',NULL,422,'added',180598,14335,83,32,'Famille',NULL,'fr',1,NULL,271,NULL),
	(210237,'2016-02-17 10:14:07',NULL,422,'added',180599,14335,83,33,'Deux ou plusieurs personnes liées par la naissance, le mariage, l’adoption, l’union civile ou tout autre statut légal de même ordre ou bien des personnes qui, pour toute autre raison, se présentent elles-mêmes comme une famille.',NULL,'fr',1,NULL,271,NULL),
	(218737,'2016-07-11 21:38:17',NULL,422,'added',187494,22989,83,13,'http://rdaregistry.info/Elements/c/C10009',NULL,'en',1,NULL,379,NULL),
	(218739,'2016-07-11 21:38:17',NULL,422,'added',187496,22989,83,1,'Place',NULL,'en',1,NULL,379,NULL),
	(218740,'2016-07-11 21:38:17',NULL,422,'added',187497,22989,83,2,'Place',NULL,'en',1,NULL,379,NULL),
	(223752,'2016-08-29 08:59:10',NULL,422,'updated',187497,22989,83,2,'place',NULL,'en',1,NULL,570,NULL),
	(218741,'2016-07-11 21:38:17',NULL,422,'added',187498,22989,83,27,'http://rdaregistry.info/Elements/c/Place.en',NULL,'en',1,NULL,379,NULL),
	(218742,'2016-07-11 21:38:17',NULL,422,'added',187499,22989,83,3,'A given extent of space.',NULL,'en',1,NULL,379,NULL),
	(218744,'2016-07-11 21:38:17',NULL,422,'added',187501,22989,83,32,'place',NULL,'en',1,NULL,379,NULL),
	(218745,'2016-07-11 21:38:17',NULL,422,'added',187502,22989,83,33,'A given extent of space.',NULL,'en',1,NULL,379,NULL),
	(258769,'2016-12-16 13:55:21',NULL,422,'added',213461,25151,83,13,'http://rdaregistry.info/Elements/c/C10010',NULL,'en',1,NULL,729,NULL),
	(258771,'2016-12-16 13:55:21',NULL,422,'added',213463,25151,83,1,'Timespan',NULL,'en',1,NULL,729,NULL),
	(258772,'2016-12-16 13:55:21',NULL,422,'added',213464,25151,83,2,'time-span',NULL,'en',1,NULL,729,NULL),
	(258773,'2016-12-16 13:55:21',NULL,422,'added',213465,25151,83,27,'http://rdaregistry.info/Elements/c/Timespan.en',NULL,'en',1,NULL,729,NULL),
	(258774,'2016-12-16 13:55:21',NULL,422,'added',213466,25151,83,3,'A temporal extent having a beginning, an end and a duration.',NULL,'en',1,NULL,729,NULL),
	(258776,'2016-12-16 13:55:21',NULL,422,'added',213468,25151,83,32,'time-span',NULL,'en',1,NULL,729,NULL),
	(357822,'2017-02-10 11:58:57',NULL,422,'added',288390,25151,83,33,'A temporal extent having a beginning, an end and a duration.',NULL,'en',1,NULL,1005,NULL),
	(258778,'2016-12-16 13:55:21',NULL,422,'added',213470,25152,83,13,'http://rdaregistry.info/Elements/c/C10011',NULL,'en',1,NULL,729,NULL),
	(258780,'2016-12-16 13:55:21',NULL,422,'added',213472,25152,83,1,'CollectiveAgent',NULL,'en',1,NULL,729,NULL),
	(258781,'2016-12-16 13:55:21',NULL,422,'added',213473,25152,83,2,'collective agent',NULL,'en',1,NULL,729,NULL),
	(258782,'2016-12-16 13:55:21',NULL,422,'added',213474,25152,83,27,'http://rdaregistry.info/Elements/c/CollectiveAgent.en',NULL,'en',1,NULL,729,NULL),
	(258783,'2016-12-16 13:55:21',NULL,422,'added',213475,25152,83,3,'A gathering or organization of persons bearing a particular name and capable of acting as a unit.',NULL,'en',1,NULL,729,NULL),
	(258784,'2016-12-16 13:55:21',NULL,422,'added',213476,25152,83,7,'A collective agent includes a corporate body and a family.',NULL,'en',1,NULL,729,NULL),
	(258786,'2016-12-16 13:55:21',NULL,422,'added',213478,25152,83,32,'collective agent',NULL,'en',1,NULL,729,NULL),
	(258787,'2016-12-16 13:55:21',NULL,422,'added',213479,25152,83,33,'A gathering or organization of persons bearing a particular name and capable of acting as a unit.',NULL,'en',1,NULL,729,NULL),
	(258789,'2016-12-16 13:55:21',NULL,422,'added',213481,25153,83,13,'http://rdaregistry.info/Elements/c/C10012',NULL,'en',1,NULL,729,NULL),
	(258791,'2016-12-16 13:55:21',NULL,422,'added',213483,25153,83,1,'Nomen',NULL,'en',1,NULL,729,NULL),
	(258792,'2016-12-16 13:55:21',NULL,422,'added',213484,25153,83,2,'nomen',NULL,'en',1,NULL,729,NULL),
	(258793,'2016-12-16 13:55:21',NULL,422,'added',213485,25153,83,27,'http://rdaregistry.info/Elements/c/Nomen.en',NULL,'en',1,NULL,729,NULL),
	(258794,'2016-12-16 13:55:21',NULL,422,'added',213486,25153,83,3,'A designation that refers to an RDA entity.',NULL,'en',1,NULL,729,NULL),
	(258795,'2016-12-16 13:55:21',NULL,422,'added',213487,25153,83,7,'A designation includes a name, title, access point, identifier, and subject classification codes and headings.',NULL,'en',1,NULL,729,NULL),
	(258797,'2016-12-16 13:55:21',NULL,422,'added',213489,25153,83,32,'nomen',NULL,'en',1,NULL,729,NULL),
	(258798,'2016-12-16 13:55:21',NULL,422,'added',213490,25153,83,33,'A designation that refers to an RDA entity.',NULL,'en',1,NULL,729,NULL),
	(258799,'2016-12-16 13:55:21',NULL,422,'added',213491,25154,83,13,'http://rdaregistry.info/Elements/c/C10013',NULL,'en',1,NULL,729,NULL),
	(258801,'2016-12-16 13:55:21',NULL,422,'added',213493,25154,83,1,'RDAEntity',NULL,'en',1,NULL,729,NULL),
	(258802,'2016-12-16 13:55:21',NULL,422,'added',213494,25154,83,2,'RDA entity',NULL,'en',1,NULL,729,NULL),
	(258803,'2016-12-16 13:55:21',NULL,422,'added',213495,25154,83,27,'http://rdaregistry.info/Elements/c/RDAEntity.en',NULL,'en',1,NULL,729,NULL),
	(258804,'2016-12-16 13:55:21',NULL,422,'added',213496,25154,83,3,'An abstract class of key conceptual objects in the universe of human discourse that is a focus of interest to users of RDA metadata in library information systems.',NULL,'en',1,NULL,729,NULL),
	(258805,'2016-12-16 13:55:21',NULL,422,'added',213497,25154,83,7,'An RDA entity includes an agent, collective agent, corporate body, expression, family,item, manifestation, nomen, person, place, time-span, and work.',NULL,'en',1,NULL,729,NULL),
	(357821,'2017-02-10 11:55:04',NULL,422,'deleted',213497,25154,83,7,'An RDA entity includes an agent, collective agent, corporate body, expression, family,item, manifestation, nomen, person, place, time-span, and work.',NULL,'en',1,NULL,NULL,NULL),
	(258807,'2016-12-16 13:55:21',NULL,422,'added',213499,25154,83,32,'RDA entity',NULL,'en',1,NULL,729,NULL),
	(258808,'2016-12-16 13:55:21',NULL,422,'added',213500,25154,83,33,'An abstract class of key conceptual objects in the universe of human discourse that is a focus of interest to users of RDA metadata in library information systems.',NULL,'en',1,NULL,729,NULL),
	(258817,'2016-12-16 13:56:05',NULL,422,'added',213509,25154,83,7,'An RDA entity includes an agent, collective agent, corporate body, expression, family, item, manifestation, nomen, person, place, time-span, and work.',NULL,'en',1,NULL,NULL,NULL);