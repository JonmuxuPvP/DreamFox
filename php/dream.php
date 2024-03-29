<?php
    class Dream 
    {
        private $id;
        private $title;
        private $content;
        private $is_lucid;
        private $date;

        public function __construct($id, $title, $content, $is_lucid, $date)
        {
            $this->id = $id;
            $this->title = $title;
            $this->content = $content;
            $this->is_lucid = $is_lucid;
            $this->date = $date;
        }

        public function toArray()
		{
            $data = array();
            foreach ($this as $key => $value) {
                if ($key === "is_lucid") {
                    $data["isLucid"] = $value;
                } else {
                    $data[$key] = $value;
                }
            }
			return $data;
		}
    }

    class Dreams 
    {
        private $dreams;     

        public function __construct()
        {
            $this->dreams = [];
        }

        public function add($dream)
        {
            array_push($this->dreams, $dream);
        }

        public function toArray()
		{
			$data = array();

			foreach ($this as $key => $value) {
                $array = [];
                foreach ($value as $dream) {
                    array_push($array, $dream->toArray());
                }
                $data[$key] = $array;
			}
	
			return $data;
		}
    }

?>