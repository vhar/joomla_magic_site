DROP TABLE IF EXISTS `#__magicsite` ;

CREATE TABLE IF NOT EXISTS `#__magicsite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `weight` int(11) DEFAULT 0,
  `published` tinyint(4) DEFAULT 1,

  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT =1;

INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Основные сведения', 'sveden', 'common', '10');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Структура и органы управления образовательной организацией', 'sveden', 'struct', '20');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Документы', 'sveden', 'document', '30');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Образование', 'sveden', 'education', '40');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Образовательные стандарты', 'sveden', 'edustandarts', '50');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Руководство. Педагогический (научно-педагогический) состав', 'sveden', 'employees', '60');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Материально-техническое обеспечение и оснащенность образовательного процесса', 'sveden', 'objects', '70');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Стипендии и меры поддержки обучающихся', 'sveden', 'grants', '80');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Платные образовательные услуги', 'sveden', 'paid_edu', '90');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Финансово-хозяйственная деятельность', 'sveden', 'budget', '100');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Вакантные места для приема (перевода) обучающихся', 'sveden', 'vacant', '110');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Доступная среда', 'sveden', 'ovz', '120');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Международное сотрудничество', 'sveden', 'inter', '130');

INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Локальные нормативные акты в сфере обеспечения информационной безопасности обучающихся', 'infosec', 'common', '140');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Нормативное регулирование', 'infosec', 'normreg', '150');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Педагогическим работникам', 'infosec', 'educator', '160');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Обучающимся', 'infosec', 'students', '170');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Родителям', 'infosec', 'parents', '180');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Детские безопасные сайты', 'infosec', 'sites', '190');

INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Нормативные правовые и иные акты в сфере противодействия коррупции', 'anticorruption', 'normativnieacti', '200');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Антикоррупционная экспертиза', 'anticorruption', 'expertise', '210');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Методические материалы', 'anticorruption', 'iniemetodmaterialy', '220');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Формы документов, связанных с противодействием коррупции, для заполнения', 'anticorruption', 'forms', '230');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Сведения о доходах, расходах, об имуществе и обязательствах имущественного характера', 'anticorruption', 'svedenodohodah', '240');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Комиссия по соблюдению требований к служебному поведению и урегулированию конфликта интересов (аттестационная комиссия)', 'anticorruption', 'commission', '250');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Обратная связь для сообщений о фактах коррупции', 'anticorruption', 'feedback', '260');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Меры юридической ответственности', 'anticorruption', 'responsibility', '270');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Информационные материалы', 'anticorruption', 'infomaterial', '280');

INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Независимая оценка качества', 'qualityassessment', 'qualityassessment', '290');

INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Дистанционное обучение', 'shedule', 'distance_education', '300');

INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Часть основной образовательной программы дошкольного образования', 'educative', 'edwpartdo', '310');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Часть основной образовательной программы начального общего образования', 'educative', 'edwpartnoo', '320');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Часть основной образовательной программы основного общего образования', 'educative', 'edwpartooo', '330');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Часть основной образовательной программы среднего общего образования', 'educative', 'edwpartsoo', '340');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Анализ достижений', 'educative', 'edwanaliz', '350');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Информация о психолого-педагогической и социальной помощи', 'educative', 'edwinfo', '360');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Общешкольные события', 'educative', 'edwevents', '370');

INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Государственная итоговая аттестация', 'sveden', 'gia', '380');

INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Организация питания', 'sveden', 'meals', '390');
INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Ежедневное меню горячего питания', 'food', 'index', '400');

INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Охрана труда', 'sveden', 'labor_protection', '410');

INSERT INTO `#__magicsite` (`title`, `category`, `alias`, `weight`) VALUES ('Основные положения учетной политики', 'sveden', 'accounting_policy', '420');
