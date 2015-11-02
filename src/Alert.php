<?php

namespace AoAlert;

class Alert
{

    /**
     * Return the message list stored in session.
     *
     * @return \Illuminate\Support\Collection
     */
    public function get()
    {
        if (!session()->has('AoAlert'))
            $this->cls();

        return session('AoAlert');
    }

    /**
     * Print the default HTML of message list.
     */
    public function cls()
    {
        session(['AoAlert' => collect([])]);
    }

    /**
     * Print the default HTML of message list.
     *
     * @return self;
     */
    public function show()
    {
        foreach ($this->get()->all() as $alert)
            echo '<div class="alert ' . $alert->type . '">
                  <button class="close" data-dismiss="alert"><span>&times;</span></button>
                  <span>' . $alert->message . '</span></div>';

        return $this;
    }

    /**
     * Add a new message in session.
     *
     * @param string $type
     * @param string|array $message
     * @return self;
     */
    public function add($type, $message)
    {
        if (is_array($message)) {
            foreach ($message as $msn)
                $this->get()->push((object)['type' => $type, 'message' => $msn]);
        } else {
            $this->get()->push((object)['type' => $type, 'message' => $message]);
        }

        return $this;
    }

    /**
     * Add a new info message in session.
     *
     * @param string|array $message
     * @return self;
     */
    public function info($message)
    {
        $this->add('alert-info', $message);
        return $this;
    }

    /**
     * Add a new success message in session.
     *
     * @param string|array $message
     * @return self;
     */
    public function success($message)
    {
        $this->add('alert-success', $message);
        return $this;
    }

    /**
     * Add a new warning message in session.
     *
     * @param string|array $message
     * @return self;
     */
    public function warning($message)
    {
        $this->add('alert-warning', $message);
        return $this;
    }

    /**
     * Add a new danger message in session.
     *
     * @param string|array $message
     * @return self;
     */
    public function danger($message)
    {
        $this->add('alert-danger', $message);
        return $this;
    }

}