<?php


    class ArgsParser
    {
        public $option;
        public $cipher;
        public $file;
        public $key;


        public function __construct($args)
        {
            //to do
            if ($args[0] === '-h') {
                $this->key = $this->file = $this->cipher = null;
                $this->option = $args['0'];
            } else {
                $this->option = $args[0] ? $args[0] : null;
                $this->cipher = $args[1] ? $args[1] : null;
                $this->file = $args[2] ? $args[2] : null;
                $this->key = $args[3] ? $args[3] : null;
            }
        }

        /**
         * @return mixed
         */
        public function getOption()
        {
            return $this->option;
        }

        /**
         * @return mixed
         */
        public function getCipher()
        {
            return $this->cipher;
        }

        /**
         * @return mixed
         */
        public function getFile()
        {
            return $this->file;
        }

        /**
         * @return mixed
         */
        public function getKey()
        {
            return $this->key;
        }


    }