<?php
/**
 * Created by: strilezkijslawa
 * Date: 9/22/2018
 * Time: 10:35 PM
 */

class Freelancehunt_API
{
    private $_api_token = 'your_token';
    private $_api_secret = 'your_secret';

    /**
     * User sign
     * @param $api_secret
     * @param $url
     * @param $method
     * @param string $post_params
     * @return string
     */
    private function _sign($api_secret, $url, $method, $post_params = '') {
        return base64_encode(hash_hmac("sha256", $url.$method.$post_params, $api_secret, true));
    }

    /**
     * Get messages [includes: page=>(int),per_page=>(int),filter=>(string)]
     * @return string
     */
    public function getThreads( $includes = array( 'filter' => 'new' ) ) {
        $includes_str = !empty($includes) ? '?' : '';
        if ( !empty($includes) ) {
            $end_key = end( array_keys($includes) );
            foreach ( $includes as $key => $val ) {
                $includes_str .= $key . '=' . $val;
                if ( $end_key != $key ) { $includes_str .= '&'; }
            }
        }

        $data = array(
            'url' => 'https://api.freelancehunt.com/threads' . $includes_str,
            'signature' => $this->_sign( $this->_api_secret, 'https://api.freelancehunt.com/threads' . $includes_str, 'GET'),
            'method' => 'GET',
            'api_token' => $this->_api_token
        );

        return $this->getFreelancehuntData( $data );
    }

    /**
     * Get message by id
     * @param $id
     * @return string
     */
    public function getThreadById( $id ) {
        $data = array(
            'url' => 'https://api.freelancehunt.com/threads/' . $id,
            'signature' => $this->_sign( $this->_api_secret, 'https://api.freelancehunt.com/threads/' . $id, 'GET'),
            'method' => 'GET',
            'api_token' => $this->_api_token
        );

        return $this->getFreelancehuntData( $data );
    }

    /**
     * Get my news feed
     * @return string
     */
    public function getFeed() {
        $data = array(
            'url' => 'https://api.freelancehunt.com/my/feed',
            'signature' => $this->_sign( $this->_api_secret, 'https://api.freelancehunt.com/my/feed', 'GET'),
            'method' => 'GET',
            'api_token' => $this->_api_token
        );

        return $this->getFreelancehuntData( $data );
    }

    /**
     * Get my profile
     * @return string
     */
    public function getMyProfile() {
        $data = array(
            'url' => 'https://api.freelancehunt.com/profiles/me',
            'signature' => $this->_sign( $this->_api_secret, 'https://api.freelancehunt.com/profiles/me', 'GET'),
            'method' => 'GET',
            'api_token' => $this->_api_token
        );

        return $this->getFreelancehuntData( $data );
    }

    /**
     * Get user profile [with reviews/portfolio]
     * @param $login
     * @param array $includes
     * @return string
     */
    public function getUserProfile( $login, $includes = array() ) {
        if ( !$login ) { return json_encode(array()); }

        $includes_str = !empty($includes) ? '?include=' . implode( ',', $includes ) : '';

        $data = array(
            'url' => 'https://api.freelancehunt.com/profiles/' . $login . $includes_str,
            'signature' => $this->_sign( $this->_api_secret, 'https://api.freelancehunt.com/profiles/' . $login . $includes_str, 'GET'),
            'method' => 'GET',
            'api_token' => $this->_api_token
        );

        return $this->getFreelancehuntData( $data );
    }

    /**
     * Get website skills
     * @return string
     */
    public function getSkills() {

        $data = array(
            'url' => 'https://api.freelancehunt.com/skills',
            'signature' => $this->_sign( $this->_api_secret, 'https://api.freelancehunt.com/skills', 'GET'),
            'method' => 'GET',
            'api_token' => $this->_api_token
        );

        return $this->getFreelancehuntData( $data );
    }

    /**
     * Get site projects [includes: page=>(int),per_page=>(int),skills=>(int)/(array),tags=>(string)/(array)]
     * @param array $includes
     * @return string
     */
    public function getProjects( $includes = array() ) {

        $includes_str = !empty($includes) ? '?' : '';
        if ( !empty($includes) ) {
            $end_key = end( array_keys($includes) );
            foreach ( $includes as $key => $val ) {
                if ( is_array($val) ) { $includes_str .= $key . '=' . implode( ',', $val ); }
                else { $includes_str .= $key . '=' . $val; }

                if ( $end_key != $key ) { $includes_str .= '&'; }
            }
        }

        $data = array(
            'url' => 'https://api.freelancehunt.com/projects' . $includes_str,
            'signature' => $this->_sign( $this->_api_secret, 'https://api.freelancehunt.com/projects' . $includes_str, 'GET'),
            'method' => 'GET',
            'api_token' => $this->_api_token
        );

        return $this->getFreelancehuntData( $data );
    }

    /**
     * Get project by id
     * @param $id
     * @return string
     */
    public function getProjectById( $id ) {
        if ( !$id ) { return json_encode(array()); }

        $data = array(
            'url' => 'https://api.freelancehunt.com/projects/' . $id,
            'signature' => $this->_sign( $this->_api_secret, 'https://api.freelancehunt.com/projects/' . $id, 'GET'),
            'method' => 'GET',
            'api_token' => $this->_api_token
        );

        return $this->getFreelancehuntData( $data );
    }

    /**
     * Get bids of selected project
     * @param $id
     * @return string
     */
    public function getProjectBids( $id ) {
        if ( !$id ) { return json_encode(array()); }

        $data = array(
            'url' => 'https://api.freelancehunt.com/projects/' . $id . '/bids',
            'signature' => $this->_sign( $this->_api_secret, 'https://api.freelancehunt.com/projects/' . $id . '/bids', 'GET'),
            'method' => 'GET',
            'api_token' => $this->_api_token
        );

        return $this->getFreelancehuntData( $data );
    }

    /**
     * Set message answer
     * @param $id
     * @param $message
     * @return string
     */
    public function setThreadAnswer( $id, $message ){
        if ( !$id || !$message ) { return json_encode(array()); }

        $params = json_encode([
            'message'   => $message
        ]);

        $data = array(
            'url' => 'https://api.freelancehunt.com/threads/' . $id,
            'signature' => $this->_sign( $this->_api_secret, 'https://api.freelancehunt.com/threads/' . $id, 'POST', $params),
            'method' => 'POST',
            'params' => $params,
            'api_token' => $this->_api_token
        );

        return $this->getFreelancehuntPostData( $data );
    }

    /**
     * Set project bid
     * @param $id
     * @param array $bid_array
     * @return string
     */
    public function setProjectBid( $id, $bid_array = array( 'days_to_deliver' => 0, 'amount' => 0, 'currency_code' => 'UAH', 'safe_type' => 'employer', 'comment' => '' ) ){
        if ( !$id || empty($bid_array) || $bid_array['comment'] == '' || $bid_array['days_to_deliver'] == 0 || $bid_array['amount'] == 0 ) { return json_encode(array()); }

        $params = json_encode([
            $bid_array
        ]);

        $data = array(
            'url' => 'https://api.freelancehunt.com/projects/' . $id,
            'signature' => $this->_sign( $this->_api_secret, 'https://api.freelancehunt.com/projects/' . $id, 'POST', $params),
            'method' => 'POST',
            'params' => $params,
            'api_token' => $this->_api_token
        );

        return $this->getFreelancehuntPostData( $data );
    }

    /**
     * Curl get request
     * @param array $data
     * @return string
     */
    public function getFreelancehuntData( $data = array() ) {
        $output = array();
        if ( empty($data) ) { return json_encode($output); }

        $curl_array = array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERPWD => $data['api_token'] . ":" . $data['signature'],
            CURLOPT_URL => $data['url']
        );

        $curl = curl_init();
        curl_setopt_array($curl, $curl_array);

        $output = curl_exec($curl);
        curl_close($curl);

        return $output;
    }

    /**
     * Curl post request
     * @param array $data
     * @return string
     */
    public function getFreelancehuntPostData( $data = array() ) {
        $output = array();
        if ( empty($data) ) { return json_encode($output); }

        $curl_array = array(
            CURLOPT_HTTPHEADER => array( 'Content-Type: application/json', 'Content-Length: ' . strlen($data['params']) ),
            CURLOPT_USERPWD => $data['api_token'] . ":" . $data['signature'],
            CURLOPT_URL => $data['url'],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data['params']
        );

        $curl = curl_init();
        curl_setopt_array($curl, $curl_array);

        $output = curl_exec($curl);
        curl_close($curl);

        return $output;
    }
}