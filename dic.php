<?php 

class DIContainer {

    /**
     * array where we store our dependencies 
     **/
     
    protected static $registry = [];
    
    /**
     * register is used to store resolvers.
     * @param string $id how you'll call the dependency
     * @param object $resolve Closure that creates the instance
     * @return void
     */
     
    public static function register($id, Closure $resolve) {
        static::$registry[$id] = $resolve;
    }
    
    /**
     * Create the instance
     * @param string $id the id to call
     * @return someObject
     */
     
     public static function resolve($id) {
        if( isset(static::$registry[$id]) )
        {
            $id = static::$registry[$id];
            return $id();
        }
        throw new Exception('Nothing registered with id ' . $id);
    }
}
