<?php
class UltimateHelper
{
    public function __construct()
    {
    }

    /**
     * Cookie Helpers
     */

    // Set A Cookie
    public function setCookie($name, $value, $expire = 0)
    {
        setcookie($name, $value, $expire, '/');
    }

    // Get A Cookie
    public function getCookie($name)
    {
        return $_COOKIE[$name];
    }

    // Delete A Cookie
    public function deleteCookie($name)
    {
        setcookie($name, '', time() - 3600, '/');
    }

    // Check If A Cookie Exists
    public function cookieExists($name)
    {
        return isset($_COOKIE[$name]);
    }

    // Check If A Cookie Is Empty
    public function cookieEmpty($name)
    {
        return empty($_COOKIE[$name]);
    }

    // Check If A Cookie Is Not Empty
    public function cookieNotEmpty($name)
    {
        return !empty($_COOKIE[$name]);
    }

    // Check If A Cookie Is Set
    public function cookieSet($name)
    {
        return isset($_COOKIE[$name]);
    }

    // Check If A Cookie Is Not Set
    public function cookieNotSet($name)
    {
        return !isset($_COOKIE[$name]);
    }

    // Check If A Cookie Is Set And Not Empty
    public function cookieSetAndNotEmpty($name)
    {
        return isset($_COOKIE[$name]) && !empty($_COOKIE[$name]);
    }

    /**
     * Time Helpers
     */

    // Get The Current Time
    public function getCurrentTime()
    {
        return time();
    }

    // Get The Current Date
    public function getCurrentDate()
    {
        return date('Y-m-d');
    }

    // Get The Current Date And Time
    public function getCurrentDateTime()
    {
        return date('Y-m-d H:i:s');
    }

    // Get The Current Date And Time In A Specific Format
    public function getCurrentDateTimeFormat($format)
    {
        return date($format);
    }

    // Convert Local Time To Gmt
    public function convertLocalToGmt($time)
    {
        return gmdate('Y-m-d H:i:s', $time);
    }

    // Convert Unix Timestamp To Human Readable Time
    public function convertUnixToHumanReadableTime($time)
    {
        return date('Y-m-d H:i:s', $time);
    }

    // Convert Human Readable Time To Unix Timestamp
    public function convertHumanReadableToUnixTime($time)
    {
        return strtotime($time);
    }

    // Calculate The Days In Month
    public function getDaysInMonth($month, $year)
    {
        return cal_days_in_month(CAL_GREGORIAN, $month, $year);
    }

    // Calculate The Days In Year
    public function getDaysInYear($year)
    {
        return cal_days_in_month(CAL_GREGORIAN, 1, $year);
    }

    // Calculate The Days In Week
    public function getDaysInWeek()
    {
        return 7;
    }

    // Calculate Days Between Two Dates
    public function getDaysBetweenDates($date1, $date2)
    {
        $date1 = strtotime($date1);
        $date2 = strtotime($date2);
        $diff = abs($date2 - $date1);
        $days = floor($diff / (60 * 60 * 24));
        return $days;
    }

    // Return An Array Of All Timezones
    public function getTimezones()
    {
        return timezone_identifiers_list();
    }

    /**
     * String Helpers
     */

    // Create Function To Generate Random String Of Given Length
    public function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // Create Function To Generate Random Number Of Given Length
    public function generateRandomNumber($length)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // Create Function To Generate Random Non-Numeric String Of Given Length
    public function generateRandomNonNumericString($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // Check If A String Is Numeric
    public function isNumeric($string)
    {
        return is_numeric($string);
    }

    // Check If String Is A Valid Phone Number
    public function isValidPhoneNumber($string)
    {
        return preg_match('/^[0-9]{10}$/', $string);
    }

    // Check Valid Email
    public function isValidEmail($string)
    {
        return filter_var($string, FILTER_VALIDATE_EMAIL);
    }

    // Change Plural To Singular
    public function pluralToSingular($string)
    {
        return str_singular($string);
    }

    // Change Singular To Plural
    public function singularToPlural($string)
    {
        return str_plural($string);
    }

    // Check If A String Is A Valid Url
    public function isValidUrl($string)
    {
        return filter_var($string, FILTER_VALIDATE_URL);
    }

    // Check If A String Is A Valid Ip Address
    public function isValidIpAddress($string)
    {
        return filter_var($string, FILTER_VALIDATE_IP);
    }

    // Strip Html Tags From String
    public function stripHtmlTags($string)
    {
        return strip_tags($string);
    }

    // Encode As Url
    public function encodeAsUrl($string)
    {
        return urlencode($string);
    }

    // Cound Number Of Words In A String
    public function countWords($string)
    {
        return str_word_count($string);
    }

    // Xss Clean A String
    public function xssClean($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    // Check If A String Is A Valid Json
    public function isValidJson($string)
    {
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }

    // Check If A String Is A Valid Xml
    public function isValidXml($string)
    {
        return is_string($string) && is_array(simplexml_load_string($string)) ? true : false;
    }

    // Check If A String Is A Valid Html
    public function isValidHtml($string)
    {
        return is_string($string) && is_array(html_entity_decode($string)) ? true : false;
    }

    // Sanitize Filename
    public function sanitizeFilename($string)
    {
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }

    // Check If A String Is A Valid Slug
    public function isValidSlug($string)
    {
        return preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $string);
    }

    // Convert Json To Xml
    public function jsonToXml($json, $root = 'root')
    {
        $json = json_decode($json, true);
        $xml = new SimpleXMLElement('<?xml version="1.0"?><' . $root . '></' . $root . '>');
        $this->_jsonToXml($json, $xml);
        return $xml->asXML();
    }

    // Convert Xml To Json
    public function xmlToJson($xml)
    {
        return json_encode(simplexml_load_string($xml));
    }

    // Convert Xml To Array
    public function xmlToArray($xml)
    {
        return json_decode(json_encode(simplexml_load_string($xml)), true);
    }

    // Strip Image Tags From String
    public function stripImageTags($string)
    {
        return preg_replace('/<img[^>]+\>/i', '', $string);
    }

    // Strip Given Html Tag From String
    public function stripHtmlTag($string, $tag)
    {
        return preg_replace('/<' . $tag . '[^>]*>/i', '', $string);
    }

    // Increment A String
    public function incrementString($string, $separator = '-')
    {
        $string = (string) $string;
        if (!ctype_digit($string)) {
            $string = $this->sanitizeFilename($string);
            $string = preg_replace('/[^a-zA-Z0-9]/', $separator, $string);
            $string = preg_replace('/-+/', $separator, $string);
        }
        $string = preg_replace('/^-+/', '', $string);
        $string = preg_replace('/-+$/', '', $string);
        return $string;
    }

    // Repeat A String For Given Number Of Times
    public function repeatString($string, $times)
    {
        return str_repeat($string, $times);
    }

    // Reduce Double Slashes From Url
    public function reduceDoubleSlashes($string)
    {
        return preg_replace('#(?<!:)//+#', '/', $string);
    }

    // Strip Slashes From A String
    public function stripSlashes($string)
    {
        return stripslashes($string);
    }

    // Remove Duplicates From A String
    public function removeDuplicates($string)
    {
        return preg_replace('/[\s]+/', ' ', $string);
    }

    // Strip Quotes From A String
    public function stripQuotes($string)
    {
        return str_replace(['"', "'"], '', $string);
    }

    // Limit A String To Given Number Of Words
    public function limitWords($string, $words = 100, $end = '...')
    {
        return implode(' ', array_slice(explode(' ', $string), 0, $words)) . $end;
    }

    // Limit A String To Given Number Of Characters
    public function limitCharacters($string, $limit = 100, $end = '...')
    {
        return substr($string, 0, $limit) . $end;
    }

    // Convert A String To Lowercase
    public function toLowerCase($string)
    {
        return mb_strtolower($string);
    }

    // Convert A String To Uppercase
    public function toUpperCase($string)
    {
        return mb_strtoupper($string);
    }

    // Convert A String To Title Case
    public function toTitleCase($string)
    {
        return mb_convert_case($string, MB_CASE_TITLE, 'UTF-8');
    }

    // Convert A String To Sentence Case
    public function toSentenceCase($string)
    {
        return ucfirst(mb_strtolower($string));
    }

    // Convert A String To Camel Case
    public function toCamelCase($string)
    {
        return lcfirst(mb_convert_case($string, MB_CASE_TITLE, 'UTF-8'));
    }

    // Convert A String To Snake Case
    public function toSnakeCase($string)
    {
        return strtolower(preg_replace('/[\s]+/', '_', $string));
    }

    // Convert A String To Kebab Case
    public function toKebabCase($string)
    {
        return strtolower(preg_replace('/[\s]+/', '-', $string));
    }

    // Convert A String To Slug Case
    public function toSlugCase($string)
    {
        return strtolower(preg_replace('/[\s]+/', '-', $string));
    }

    // Censor A Word In A String
    public function censorWord($string, $word, $censored = '*')
    {
        return str_ireplace($word, $censored, $string);
    }

    // Count Number Of Times A Word Occurs In String
    public function countWord($string, $word)
    {
        return substr_count($string, $word);
    }

    // Ellipize A String
    public function ellipize($string, $length = 100, $end = '...')
    {
        return $this->limitCharacters($string, $length, $end);
    }

}
