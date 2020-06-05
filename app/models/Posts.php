<?php
    class Posts extends Model {

        public function __construct($post='') {
            $table = 'posts';
            $p = null;
            parent::__construct($table);
            if ($post != '') {
                $p = $this->_db->findFirst('posts', ['conditions'=>'id = ?', 'bind' => [$post]]);
            }
            if ($p) {
                foreach ($p as $key => $val) {
                    $this->$key = $val;
                }
            }
        }

        public function totalPagesNumber() {
            $posts_number = $this->_db->query('SELECT COUNT(*) FROM ' . $this->_table);
            if (!empty($posts_number)) {
                $posts_number = 0;
            }
            return $posts_number;
        }

        public function paginate($page=1) {
            $page -= 1;
            $offset = $page * DEFAULT_POSTS_PER_PAGE;
            $posts = $this->_db->query('SELECT * FROM ' . $this->_table . ' LIMIT ' . DEFAULT_POSTS_PER_PAGE . ' OFFSET ' .$offset.';')->results();
            return $posts;
        }

        public function postNewPost($params) {
            $target_file = ROOT . '/static/img/' . $_FILES['thumb']['name'];
            if (move_uploaded_file($_FILES['thumb']['tmp_name'], $target_file)) {
                $this->assign($params);
                $this->thumb = '/static/img/' . $_FILES['thumb']['name'];
                $this->status = 1;
                $this->save();
            }
        }

        public function editPost($params) {
            if (move_uploaded_file($_FILES['thumb']['tmp_name'], ROOT . $this->thumb)) {
                $this->assign($params);
                $this->save();
            }
        }
    }