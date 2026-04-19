<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rounds Model
 *
 * @property \App\Model\Table\PlayersTable&\Cake\ORM\Association\BelongsTo $Players
 * @property \App\Model\Table\CourseTeesTable&\Cake\ORM\Association\BelongsTo $CourseTees
 * @property \App\Model\Table\RoundHolesTable&\Cake\ORM\Association\HasMany $RoundHoles
 *
 * @method \App\Model\Entity\Round newEmptyEntity()
 * @method \App\Model\Entity\Round newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Round> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Round get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Round findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Round patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Round> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Round|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Round saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Round>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Round>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Round>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Round> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Round>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Round>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Round>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Round> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RoundsTable extends Table
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

        $this->setTable('rounds');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Players', [
            'foreignKey' => 'player_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('CourseTees', [
            'foreignKey' => 'course_tee_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('RoundHoles', [
            'foreignKey' => 'round_id',
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
            ->integer('player_id')
            ->notEmptyString('player_id');

        $validator
            ->integer('course_tee_id')
            ->notEmptyString('course_tee_id');

        $validator
            ->dateTime('tee_time')
            ->requirePresence('tee_time', 'create')
            ->notEmptyDateTime('tee_time');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['player_id'], 'Players'), ['errorField' => 'player_id']);
        $rules->add($rules->existsIn(['course_tee_id'], 'CourseTees'), ['errorField' => 'course_tee_id']);

        return $rules;
    }
}
