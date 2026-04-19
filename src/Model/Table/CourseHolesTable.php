<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CourseHoles Model
 *
 * @property \App\Model\Table\CoursesTable&\Cake\ORM\Association\BelongsTo $Courses
 * @property \App\Model\Table\CourseHoleDistancesTable&\Cake\ORM\Association\HasMany $CourseHoleDistances
 * @property \App\Model\Table\RoundHolesTable&\Cake\ORM\Association\HasMany $RoundHoles
 *
 * @method \App\Model\Entity\CourseHole newEmptyEntity()
 * @method \App\Model\Entity\CourseHole newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CourseHole> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CourseHole get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CourseHole findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CourseHole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CourseHole> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CourseHole|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CourseHole saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CourseHole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CourseHole>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CourseHole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CourseHole> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CourseHole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CourseHole>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CourseHole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CourseHole> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CourseHolesTable extends Table
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

        $this->setTable('course_holes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('CourseHoleDistances', [
            'foreignKey' => 'course_hole_id',
        ]);
        $this->hasMany('RoundHoles', [
            'foreignKey' => 'course_hole_id',
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
            ->integer('course_id')
            ->notEmptyString('course_id');

        $validator
            ->integer('number')
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        $validator
            ->integer('par')
            ->requirePresence('par', 'create')
            ->notEmptyString('par');

        $validator
            ->integer('hcp')
            ->requirePresence('hcp', 'create')
            ->notEmptyString('hcp');

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
        $rules->add($rules->isUnique(['course_id', 'number']), ['errorField' => 'course_id', 'message' => __('This combination of course_id and number already exists')]);
        $rules->add($rules->existsIn(['course_id'], 'Courses'), ['errorField' => 'course_id']);

        return $rules;
    }
}
