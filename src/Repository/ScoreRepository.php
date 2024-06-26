<?php

namespace App\Repository;

use App\DTO\ScoreDTO;
use App\Entity\Score;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Score>
 *
 * @method Score|null find($id, $lockMode = null, $lockVersion = null)
 * @method Score|null findOneBy(array $criteria, array $orderBy = null)
 * @method Score[]    findAll()
 * @method Score[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Score::class);
    }

    /**
     * @return ScoreDTO[] Returns an array of ScoreDto objects
     */
    public function findScore(): array
    {
        return $this->createQueryBuilder('s')
            ->select(
                'NEW App\DTO\ScoreDTO(
                    t.name,
                    SUM(tk.valueToken)
                )'
            )
            ->innerJoin('s.team', 't')
            ->innerJoin('s.tokens', 'tk')
            ->groupBy('t.name')
            ->orderBy('s.dateScore')
            ->getQuery()
            ->getResult();
    }
}
