<?php
    class Posts extends Model {

        public function __construct($post='') {
            $table = 'posts';
            parent::__construct($table);
            if ($post != '') {
                $p = $this->_db->findFirst('posts', ['conditions'=>'id = ?', 'bind' => [$post]]);
            }
            if ($u) {
                foreach ($u as $key => $val) {
                    $this->$key = $val;
                }
            }
        }

        public static function totalPagesNumber() {
            $posts_number = $this->_db->query('SELECT COUNT(*) FROM ' . $this->_table);
            if (!empty($posts_number)) {
                $posts_number = $posts_number[0];
            }
            return $posts_number;
        }

        public static function paginate($page) {
            $posts_number = self::totalPagesNumber();
            $posts = $this->_db->query('SELECT * FROM ' . $this->_table . ' LIMIT ' . DEFAULT_POSTS_PER_PAGE . ' OFFSET {$page * DEFAULT_POSTS_PER_PAGE};');
            return $posts;
        }

        public function editPost($params = []) {
            if (!$this->id) {
                return false;
            } else {
                
            }
        }
    }