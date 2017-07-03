<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Dell
 */
interface subject
{
    public function RegisterObserver();
    public function RemoveObserver();
    public function NotifyObserver($id);
}
