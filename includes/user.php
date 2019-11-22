<?php

// If it's going to need the database, then it's
// probably smart to require it before we start
require_once('database.php');

class User extends DatabaseObject {

    protected static $table_name = "users";
    protected static $db_fields  = array(
        'id',
        'username',
        'password',
        'first_name',
        'last_name',
        'biography',
        'email',
        'phone',
        'location',
        'website',
        'facebook',
        'twitter',
        'linkedin',
        'created',
        'education',
        'degree',
        'industry',
        'employer',
        'job_title',
        'job_description',
        'marital_status',
        'gender',
        'birthday',
        'filename',
        'type',
        'size',
        'caption'
    );

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $biography;
    public $email;
    public $phone;
    public $location;
    public $website;
    public $facebook;
    public $twitter;
    public $linkedin;
    public $created;
    public $education;
    public $degree;
    public $industry;
    public $employer;
    public $job_title;
    public $job_description;
    public $marital_status;
    public $gender;
    public $birthday;
    public $filename;
    public $type;
    public $size;
    public $caption;

    private   $temp_path;
    protected $upload_dir = "profiles";
    public    $errors     = array();

    protected $upload_errors = array(
        UPLOAD_ERR_OK         => "No errors.",
        UPLOAD_ERR_INI_SIZE   => "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE  => "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL    => "Partial upload.",
        UPLOAD_ERR_NO_FILE    => "No file.",
        UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION  => "File upload stopped by extension."

    );

    // User Methods
    public function full_name() {
        if (isset($this->first_name) && isset($this->last_name)) {
            return $this->first_name . " " . $this->last_name;
        } else {
            return "";
        }
    }

    public static function authenticate($username = "", $password = "") {
        global $database;
        $username = $database->escape_value($username);
        $password = $database->escape_value($password);

        $sql = "SELECT * FROM users ";
        $sql .= "WHERE username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";
        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    // Profile Picture Methods
    /**
     * Pass in $_FILE(['uploaded_file']) as an argument
     *
     * @param $file
     *
     * @return bool
     */
    public function attach_file($file) {

        if (!$file || empty($file) || !is_array($file)) {
            $this->errors[] = "No file was uploaded.";
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors[$file['error']];
            return false;
        } else {
            $this->temp_path = $file['tmp_name'];
            $this->filename  = basename($file['name']);
            $this->type      = $file['type'];
            $this->size      = $file['size'];
            return true;
        }
    }

    /**
     * @return bool
     */
    public function image_save() {

    }

    public function image_path() {
        return $this->upload_dir . DS . $this->filename;
    }

    public function size_as_text() {
        if ($this->size < 1024) {
            return "{$this->size} bytes";
        } elseif ($this->size < 1048576) {
            $size_kb = round($this->size / 1024);
            return "{$size_kb} KB";
        } else {
            $size_mb = round($this->size / 1048576, 1);
            return "{$size_mb} MB";
        }
    }

    // Common Database Methods
    public static function find_all() {
        return self::find_by_sql("SELECT * FROM " . self::$table_name);
    }

    public static function find_by_id($id = 0) {
        global $database;
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE id = {$id} LIMIT 1;");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_username($username) {
        global $database;
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE username = '" . $username . "' LIMIT 1;");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_sql($sql = "") {
        global $database;
        $result_set   = $database->query($sql);
        $object_array = array();
        while ($row = $database->fetch_array($result_set)) {
            $object_array[] = self::instantiate($row);
        }
        return $object_array;
    }

    public static function count_all() {
        global $database;
        $sql = "SELECT COUNT(*) FROM ".self::$table_name;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }

    private static function instantiate($record) {

        $object = new self;

        // More dynamic, short-form approach:
        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function has_attribute($attribute) {

        // We don't care about the value, we just want to know if the key exists
        // Will return true or false
        return array_key_exists($attribute, $this->attributes());
    }

    protected function attributes() {
        // return an array of attribute keys and their values
        $attributes = array();
        foreach (self::$db_fields as $field) {
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }

    protected function sanitized_attributes() {
        global $database;
        $clean_attributes = array();
        foreach ($this->attributes() as $key => $value) {
            $clean_attributes[$key] = $database->escape_value($value);
        }
        return $clean_attributes;
    }

    public function save() {

        $target_path = dirname(SITE_ROOT) . DS . 'public' . DS . $this->upload_dir . DS . $this->filename;
        move_uploaded_file($this->temp_path, $target_path);
        unset($this->temp_path);

        return isset($this->id) ? $this->update() : $this->create();

    }

    public function create() {
        global $database;
        $attributes = $this->sanitized_attributes();

        $sql = "INSERT INTO " . self::$table_name . " (";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        if ($database->query($sql)) {
            $this->id = $database->insert_id();
            return true;
        } else {
            return false;
        }
    }

    public function update() {
        global $database;
        $attributes = $this->sanitized_attributes();

        $attribute_pairs = array();
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . self::$table_name . " SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE id=" . $database->escape_value($this->id);
        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;
    }

    public function delete() {
        global $database;

        $sql = "DELETE FROM " . self::$table_name;
        $sql .= " WHERE id=" . $database->escape_value($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;
    }

}