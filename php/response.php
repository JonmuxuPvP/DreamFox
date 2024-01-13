<?php
    /**
     * This class models an HTTP response.
     * Any data given to an instance of this class will be sent in the JSON format
     * */
    class Response 
    {
        private $data;

        /**
         * Creates a response instance given some data.
         *
         * @param data - object, string, array to be sent
         * */
        public function __construct($data)
        {
            $this->data = $data;
        }

        /**
         * Transforms this instance's data into JSON
         * */
        public function send()
        {
            echo json_encode($this->data->toArray(), JSON_UNESCAPED_UNICODE);
        }
    }

?>
