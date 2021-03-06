<?php // Core/Repository/UserRepository.php
/**
 * http://mackstar.com/blog/2010/10/04/using-repositories-doctrine-2
 * http://stackoverflow.com/questions/9214471/count-rows-in-doctrine-querybuilder
 * http://www.wjgilmore.com/blog/entry/the_power_of_doctrine_2s_custom_repositories_and_native_queries
 * http://weavora.com/blog/2013/08/23/how-we-organize-doctrine2-repositories/
 */

namespace Core\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;


class UserRepository extends EntityRepository 
{
    
    /**
     * Returns Doctrine Query Object
     * 
     * @param Zend\Stdlib\Parameters $params 
     * @return  Doctrine Query object
     */
    public function getSearchQuery(\Zend\Stdlib\Parameters $params) 
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u');
        $qb->from('Core\Entity\User', 'u');

        if(!empty($params->username) ) {
            $qb->andWhere('u.username = :username');
            $qb->setParameter('username', $params->username);
        }

        if(!empty($params->name) ) {
            $qb->andWhere('u.name = :name');
            $qb->setParameter('name', $params->name);
        }

        if(!empty($params->role) ) {
            $qb->andWhere('u.role = :role');
            $qb->setParameter('role', $params->role);
        }

        $qb->orderBy('u.id', 'DESC');

        #$qb->setFirstResult( $offset );
        #$qb->setMaxResults( $limit );

        return $qb->getQuery();
        //return $qb->getQuery()->getResult();
    }



    /**
     * Returns last registered users
     * 
     * @param int $limit
     */
    public function findRecent($limit = 5) 
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u');
        $qb->from('Core\Entity\User', 'u');

        $qb->where('u.status = :status');
        $qb->setParameter('status', \Core\Entity\User::STATUS_VALIDATED);

        $qb->orderBy('u.created_at', 'DESC');
        $qb->setMaxResults($limit);
        $result = $qb->getQuery()->getResult();

        // return new \Doctrine\Common\Collections\ArrayCollection($result);
        return $result;
    }



    /**
     * Returns collection by role
     * 
     * @param \Core\Entity\Role $role
     */
    public function findByRole(\Core\Entity\Role $role) 
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u');
        $qb->from('Core\Entity\User', 'u');

        $qb->where('u.role = :role');
        $qb->setParameter('role', $role);

        $qb->orderBy('u.id', 'DESC');
        // $qb->setMaxResults($limit);

        $result = $qb->getQuery()->getResult();

        return $result;
    }


    /**
     * @param \Core\Entity\Language $language
     */
    public function countByLanguage(\Core\Entity\Language $language) 
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u');
        $qb->from('Core\Entity\User', 'u');

        $qb->where('u.language = :language');
        $qb->setParameter('language', $language);
    }  


    /**
     * @param \Core\Entity\Country $country
     */
    public function countByCountry(\Core\Entity\Country $country) 
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u');
        $qb->from('Core\Entity\User', 'u');

        $qb->where('u.country = :country');
        $qb->setParameter('country', $country);
    } 


    /**
     * @param int $status
     */
    public function countByStatus($status) 
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u');
        $qb->from('Core\Entity\User', 'u');

        $qb->where('u.status = :status');
        $qb->setParameter('status', $status);
    }

      
    /**
     * @param int $gender
     */
    public function countByGender($gender) {}



    /**
     * Just a test
     */
    public function findAll() 
    {
        //$dql = "SELECT s FROM Core\Entity\User u";
        //$query = $this->_em->createQuery($dql);

        return $this->select('u')
            ->from('Core\Entity\User', 'u')
            ->getQuery()
            ->getResult();
    }
    

    /**
     * Just a test
     * @param int $id
     */
    public function findById($id) 
    {
        return $this->_em->findOneBy(array('id' => $id));
    }


    public function getTest() 
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u');
        $qb->from('Core\Entity\User', 'u');
        $qb->orderBy('u.id');
        $qb->setFirstResult( $offset );
        $qb->setMaxResults( $limit );
        
        return $qb->getQuery()->getResult();
    }

    
    /**
     * Just a test
     * @param int $offset
     * @param int $limit
     */
    public function getPaginator($offset, $limit)
    {
    	$dql = "SELECT s FROM Core\Entity\User u";
    	$query = $this->_em->createQuery($dql)
            ->setFirstResult($offset)->setMaxResults($limit);

    	$paginator = new Paginator($query);
    	return $paginator;
    }   

}