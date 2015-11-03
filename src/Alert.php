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
        foreach ($this->get()->all() as $alert) {
            echo '<div class="alert ' . $alert->type . '">';
            echo '<button class="close" data-dismiss="alert"><span>&times;</span></button>';
            echo '<span>' . $alert->message . '</span>';

            if (!empty($alert->details)) {
                echo '<br/><br/><ul>';
                foreach ($alert->details as $detail)
                    echo '<li>' . $detail . '</li>';
                echo '</ul>';
            }

            echo '</div>';
        }

        return $this;
    }

    /**
     * Add a new message in session.
     *
     * @param string $type
     * @param string|array $message
     * @param array $details
     * @return self;
     */
    public function add($type, $message, array $details = null)
    {
        if (is_array($message)) {
            foreach ($message as $msn)
                $this->get()->push((object)['type' => $type, 'message' => $msn]);
        } else {
            $this->get()->push((object)['type' => $type, 'message' => $message, 'details' => $details]);
        }

        return $this;
    }

    /**
     * Add a new info message in session.
     *
     * @param string|array $message
     * @param array $details
     * @return self;
     */
    public function info($message, array $details = null)
    {
        $this->add('alert-info', $message, $details);
        return $this;
    }

    /**
     * Add a new success message in session.
     *
     * @param string|array $message
     * @param array $details
     * @return self;
     */
    public function success($message, array $details = null)
    {
        $this->add('alert-success', $message, $details);
        return $this;
    }

    /**
     * Add a new warning message in session.
     *
     * @param string|array $message
     * @param array $details
     * @return self;
     */
    public function warning($message, array $details = null)
    {
        $this->add('alert-warning', $message, $details);
        return $this;
    }

    /**
     * Add a new danger message in session.
     *
     * @param string|array $message
     * @param array $details
     * @return self;
     */
    public function danger($message, array $details = null)
    {
        $this->add('alert-danger', $message, $details);
        return $this;
    }

}