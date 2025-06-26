<?php
/**
 * AccessControl
 * Helper functions for role-based access levels
 */

class AccessControl
{
    public static function isEmployee()
    {
        return (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] == 50);
    }

    public static function isReadOnly()
    {
        return (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] == 100);
    }

    public static function isManager()
    {
        return (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] == 300);
    }

    public static function isAdmin()
    {
        return (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] >= 400);
    }

    public static function isRoot()
    {
        return (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] == 500);
    }

    public static function isPrivileged()
    {
        return (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] >= 200);
    }

    public static function denyIfNot($condition)
    {
        if (!$condition) {
            echo "<h3>Access Denied</h3>";
            exit;
        }
    }
}
?>
