<?php
include_once "Node.php";
class MyLinkedList
{
    private $head;
    private $numNodes;
    private $tail;

    public function __construct()
    {
        $this->numNodes = 0;
        $this->head = NULL;
        $this->tail = NULL;
    }

    public function add($index, $data)
    {
        if ($index == 0 )
        {
         $this->addFirst($data);
        }
        else
        {
            $link = new Node($data);
            $previous = $this->head;
            $current = $this->head->next;
            for ($i = 0; $i < $index; $i++)
            {
                $previous = $current;
                $current = $current->next;

            }

            $previous->next = $link;
            $link->next = $current;
            $this->numNodes++;
        }
    }
    public function addFirst($data)
    {
        $link = new Node($data);
        $link->next = $this->head;
        $this->head = $link;
        if ($this->tail == NULL)
            $this->tail = $link;
        $this->numNodes++;

    }
    public function addLast($data)
    {
        if ($this->head != NULL)
        {
            $link = new Node($data);
            $this->tail->next = $link;
            $this->next = NULL;
            $link->tail = $link;
            $this->numNodes++;
        }
        else
        {
            $this->addFirst($data);
        }
    }

    public function removeFirst()
    {
        $temp = $this->head;
        $this->head = $this->head->next;
        if ($this->head != NULL)
            $this->numNodes--;
        return $temp;
    }
    public function removeLast()
    {
        if ($this->head != NULL)
        {
            if ($this->head->next == NULL)
            {
                $this->head = NULL;
                $this->numNodes--;
            }
            else
            {
                $previous = $this->head;
                $current = $this->head->next;

                While ($current->next != NULL)
                {
                    $previous = $current;
                    $current = $current->next;
                }
                $previous->next = NULL;
                $this->numNodes--;
            }

        }
    }

    public function remove($data)
    {
        $current = $this->head;
        $previous = $this->head;
        while ($current->data != $data)
        {
            if ($current->next == NULL)
                return NULL;
            else
            {
                $previous = $current;
                $current = $current->next;
            }
        }
        if($current == $this->head)
        {
            if ($this->numNodes == 1)
            {
                $this->tail = $this->head;
            }
            $this->head = $this->head->next;
        }
        else
        {
            if ($this->tail == $current)
            {
                $this->tail = $previous;
            }
            $previous->next = $current->next;
        }
        $this->numNodes--;
    }
    public function getFirst()
    {
        return $this->head->data;
    }
    public function getLast()
    {
        return $this->tail->data;
    }

    public function getIndex($index)
    {
        if ($index == 0) {
            return $this->getFirst();
        } else {
            $current = $this->head;
            for ($i = 0; $i < $index; $i++) {
                $current = $current->next;
            }
            return $current->data;
        }
    }

    public function size()
    {
        return $this->numNode;
    }
    public function printList()
    {
        $listData = array();
        $current = $this->head;
        while ($current != NULL) {
            array_push($listData, $current->getData());
            $current = $current->next;
        }
        return $listData;
    }
    public function cloneList()
    {
        $cloneList = $this->printList();
        return $cloneList;
    }
    public function contains($data)
    {
        $current = $this->head;
        $flag = null;
        while ($current != NULL) {
            if ($current->data == $data) {
                $flag = 'true';
                break;
            } else {
                $current = $current->next;
                $flag = 'false';
            }
        }
        return $flag;
    }
    public function indexOf($data)
    {
        $current = $this->head;
        $flag = null;
        $index = 0;
        while ($current != NULL) {
            if ($current->data == $data) {
                $flag = 'true';
                break;
            } else {
                $current = $current->next;
                $flag = 'false';
                $index++;
            }
        }
        if ($flag == 'true') {
            return $index;
        } else {
            return $flag;
        }
    }
    public function clear()
    {
        $this->head = NULL;
    }
    public function reverse()
    {
        if ($this->head != NULL) {
            if ($this->head->next != NULL) {
                $current = $this->head;
                $new = NULL;
                while ($current != NULL) {
                    $temp = $current->next;
                    $current->next = $new;
                    $new = $current;
                    $current = $temp;
                }
                $this->head = $new;
            }
        }
    }


}