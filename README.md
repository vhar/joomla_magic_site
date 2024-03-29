Компонент интеграции MagicSite c Joomla!
========================================

# Описание
Компонент предназначен для автоматического встраивания обязательных разделов сайта образовательных организаций, предусмотренных законодательством Российской Федерации, из информационной системы «MagicSite» на сайт под управлением CMS Joomla!.
Внешний вид сайта, включая меню и инкапсулированные обязательные разделы, устанавливается в CMS Joomla!. Плагин не оказывает влияния на необязательные разделы, которые ведутся на сайте CMS Joomla!.  
При использовании плагина владелец сайта должен завести аккаунт в информационной системе MagicSite и внести в неё данные о своей организации.  
Информационная система «MagicSite» зарегистрирована в РОСПАТЕНТ № 2020662557 от 16 октября 2020 год, включена в Единый реестр российских программ для электронных вычислительных машин и баз данных по Приказу Минцифры России от 15.03.2021 № 151 Приложение № 2, реестровый №9719, совместима со всеми операционными системами, в том числе с операционной системой Альт на платформе х86 и для архитектуры aarch64.  

Информационная система «MagicSite» предусматривает ведение следующих обязательных разделов со своими подразделами:
 * Сведения об образовательной организации;
 * Информационная безопасность;
 * Противодействие коррупции;
 * Независимая оценка качества;
 * Педагоги;
 * Организация питания.

Представление на сайте производится в строгом соответствии с законодательством. При изменении законодательства в ИС MagicSite вносятся соответствующие правки, что автоматически находит отражение на сайте пользователя. Пользователь избавлен от необходимости отслеживать требования к сайтам образовательных организаций – достаточно заполнять поля ИС MagicSite. Данные попадают в систему мониторинга сайтов.

# Установка / Обновление
1. Скачайте ZIP архив компонента https://github.com/e-publish/joomla_magic_site/raw/master/com_magicsite.zip
2. Зайдите в административную панель CMS Joomla! вашего сайта
	>Чтобы войти в административную панель Joomla!, вбейте в адресной строке ссылку http://ваш_сайт/administrator, где вместо «ваш_сайт» — доменное имя (адрес) вашего сайта.
	>Откроется страница с формой для входа в админ-панель.
	>После успешной авторизации вы окажитесь на главной странице панели администратора.
	>Если вы уже авторизованы в административной панели, выберите в верхнем меню "Система" -> "Панель управления"
3. В разделе "Расширения", левого бокового меню, кликните по ссылке "Установка расширений"
4. Нажмите кнопку "Загрузить плагин"
5. В поле "Загрузить и установить файл пакета" кликните по кнопке "Или выберите файл" и выберите скачанный в шаге 1 архив

После установки плагина вы будете перенаправлены на страницу настроек компонента.

# Настройка
В поле "URL сайта в ИС MagicSite" укажите адрес сайта, созданного в виртуальном кабинете MagicSite (https://cp.edusite.ru)  
Нажмите кнопку "Сохранить".

Для перехода на страницу настроек компонента, если нужно изменить URL сайта в ИС MagicSite или не произошло автоматическое перенаправление после установки плагина:
1. Зайдите в административную панель CMS Joomla! вашего сайта
	>Чтобы войти в административную панель Joomla!, вбейте в адресной строке ссылку http://ваш_сайт/administrator, где вместо «ваш_сайт» — доменное имя (адрес) вашего сайта.
	>Откроется страница с формой для входа в админ-панель.
	>После успешной авторизации вы окажитесь на главной страницы панели администратора.
	>Если вы уже авторизованы в административной панели, выберите в верхнем меню "Система" -> "Панель управления"
2. В разделе "Настройки", левого бокового меню, кликните по ссылке "Общие настройки"
3. На странице общих настроек, в левом боковом меню, кликните по ссылке MagicSite
4. Введите или измените адрес сайта в поле "URL сайта в ИС MagicSite"
5. Нажмите кнопку "Сохранить".

# Меню компонента
В случае успешной установки компонента, меню навигации добавляется на сайт автоматически в туже область, где находится главное меню сайта.  
Если этого не произошло или вы хотите изменить расположение данного меню,  то для этого:
1. Зайдите в административную панель CMS Joomla! вашего сайта
	>Чтобы войти в административную панель Joomla!, вбейте в адресной строке ссылку http://ваш_сайт/administrator, где вместо «ваш_сайт» — доменное имя (адрес) вашего сайта.
	>Откроется страница с формой для входа в админ-панель.
	>После успешной авторизации вы окажитесь на главной страницы панели администратора.
	>Если вы уже авторизованы в административной панели, выберите в верхнем меню "Система" -> "Панель управления" 
2. В разделе "Структура", левого бокового меню, кликните по ссылке "Менеджер меню"
3. В колонке "Модули, связанные с меню", таблицы кликните по кнопке "Модули" ("Создать модуль для меню" - если по какой-то причине он не создался при установке") в строке с заголовком "Сведения об образовательной организации" и выберите в выпадающем списке "Сведения"
4. В открывшейся форме внесите требуемые изменения в настройки модуля меню.  
	Рекомендуемые настройки:
	* Значение полей "Заголовок*" (Сведения), "Базовый пункт меню" (Текущий), "Начальный уровень" (1) и "Последний уровень" (Все) не рекомендуется изменять.
	* "Показывать подпункты меню" - НЕТ. В этом случае в меню будет показан только список разделов и подпункты меню выбранного раздела. Если вы хотите, чтобы в меню на сайте всегда отображались подпункты всех разделов, установите значение "ДА"
	* "Заголовок" - СКРЫТЬ. Если вы хотите, чтобы в верхней части блока меню отображался заголовок "Сведения", установите значение ПОКАЗЫВАТЬ
	* Заголовок меню, в случае необходимости, можно изменить в поле "Заголовок*" в верхней части окна
	* Поле "Позиция" - область страницы, в которой будет отображаться меню. Рекомендуем расположить меню в одной области с главным меню сайта.
	* Поле "Состояние" (Опубликовано). Не рекомендуем изменять это поле, но если вам необходимо временно скрыть меню с сайта, установите значение "Не опубликовано"
	* Поля "Начало публикации" и "Завершение публикации" оставьте пустыми.
	* Поле "Доступ" (Public), "Порядок", "Язык" - оставьте как есть
	
5. Нажмите кнопку "Сохранить и закрыть"

# Удаление
1. Зайдите в административную панель CMS Joomla! вашего сайта
	>Чтобы войти в административную панель Joomla!, вбейте в адресной строке ссылку http://ваш_сайт/administrator, где вместо «ваш_сайт» — доменное имя (адрес) вашего сайта.
	>Откроется страница с формой для входа в админ-панель.
	>После успешной авторизации вы окажитесь на главной страницы панели администратора.
	>Если вы уже авторизованы в административной панели, выберите в верхнем меню "Система" -> "Панель управления" 
2. В разделе "Расширения", левого бокового меню, кликните по ссылке "Установка расширений"
3. На странице менеджера расширений, в левом боковом меню, кликните по ссылке "Управление"
4. В поле поиска введите magicsite и кликните по кнопке с иконкой лупы справа от поля поиска
5. Отметтье чекбокс в строке с компонентом "MagicSite"
6. Кликните по кнопке "Деинсталлировать"
7. Подтвердите удаление выбранного компонента
