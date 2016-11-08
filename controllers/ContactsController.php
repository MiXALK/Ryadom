<?php

class ContactsController
{
    public function actionAbout(){

        require_once(ROOT.'/views/contact.php');

        return true;
    }

    /**
     * Action для страницы "Контакты"
     */
    public function actionContacts()
    {

        // Переменные для формы
        $userEmail = false;
        $userText = false;
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $userEmail = htmlspecialchars($_POST['userEmail']);
            $userText = strip_tags($_POST['userText']);

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный Email';
            }

            if ($errors == false) {
                $userEmail = htmlspecialchars_decode($userEmail);
                // Если ошибок нет
                // Отправляем письмо администратору 
                $adminEmail = 'olalogan@mail.ru';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/contact.php');
        return true;
    }

}
