<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Players Model
 *
 * @property \App\Model\Table\RoundsTable&\Cake\ORM\Association\HasMany $Rounds
 *
 * @method \App\Model\Entity\Player newEmptyEntity()
 * @method \App\Model\Entity\Player newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Player> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Player get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Player findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Player patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Player> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Player|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Player saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Player>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Player>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Player>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Player> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Player>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Player>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Player>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Player> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PlayersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('players');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Rounds', [
            'foreignKey' => 'player_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 128)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
